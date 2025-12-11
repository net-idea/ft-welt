(function () {
  const d: Document = document;

  const emailUser: number[] = [112, 111, 115, 116];
  const emailDomain: number[] = [102, 116, 45, 119, 101, 108, 116, 46, 100, 101];
  const phoneNationalCharCodes: number[] = [48, 49, 53, 55, 53, 53, 52, 50, 51, 52, 51, 48];
  const whatsappNationalCharCodes: number[] = [48, 49, 55, 50, 56, 50, 54, 56, 54, 52, 48];

  function fromCodes(arr: number[]): string {
    return String.fromCharCode.apply(null, arr as unknown as number[]);
  }

  function normalizePhoneToE164Digits(raw: string, countryCallingCodeDigits: string): string {
    const cleaned = (raw || '').trim();
    if (!cleaned) return '';
    const hasPlus = cleaned.startsWith('+');
    const digitsOnly = cleaned.replace(/\D+/g, '');
    if (!digitsOnly) return '';
    if (hasPlus) return digitsOnly;
    if (digitsOnly.startsWith('00')) return digitsOnly.slice(2);
    if (digitsOnly.startsWith(countryCallingCodeDigits)) return digitsOnly;
    const national = digitsOnly.replace(/^0+/, '');
    return countryCallingCodeDigits + national;
  }

  function formatGermanDisplayFromNational(rawNational: string): string {
    const digits = (rawNational || '').replace(/\D+/g, '');
    const national = digits.replace(/^0+/, '');
    if (national.length >= 5) {
      const block1 = national.slice(0, 4);
      const rest = national.slice(4);
      return `+49 ${block1} / ${rest}`;
    }
    return `+49 ${national}`.trim();
  }

  const email: string = fromCodes(emailUser) + '@' + fromCodes(emailDomain);

  const rawPhoneNational: string = fromCodes(phoneNationalCharCodes);
  const phoneText: string = formatGermanDisplayFromNational(rawPhoneNational);
  const phoneE164Digits: string = normalizePhoneToE164Digits(rawPhoneNational, '49');
  const phoneTel: string = phoneE164Digits ? `+${phoneE164Digits}` : '';

  // WhatsApp-Nummer separat dekodieren
  const rawWhatsappNational: string = fromCodes(whatsappNationalCharCodes);
  const whatsappText: string = formatGermanDisplayFromNational(rawWhatsappNational);
  const whatsappE164Digits: string = normalizePhoneToE164Digits(rawWhatsappNational, '49');

  // Email links (supports multiple)
  const emailElements = Array.from(d.querySelectorAll<HTMLElement>('.contact-email'));
  const emailElementById = d.getElementById('contact-email');

  if (emailElements.length === 0 && emailElementById) emailElements.push(emailElementById);

  emailElements.forEach((emailElement) => {
    const a: HTMLAnchorElement = d.createElement('a');
    a.href = 'mailto:' + email;
    a.textContent = email;
    a.rel = 'nofollow';
    emailElement.replaceWith(a);
  });

  // Phone links (supports multiple)
  const phoneElements = Array.from(d.querySelectorAll<HTMLElement>('.contact-phone'));
  const phoneElementById = d.getElementById('contact-phone');

  if (phoneElements.length === 0 && phoneElementById) phoneElements.push(phoneElementById);

  phoneElements.forEach((phoneElement) => {
    const a: HTMLAnchorElement = d.createElement('a');

    if (phoneTel) {
      a.href = 'tel:' + phoneTel;
    }

    a.textContent = phoneText;
    a.rel = 'nofollow';
    phoneElement.replaceWith(a);
  });

  // WhatsApp links (supports multiple) - single known icon path
  const whatsappElements = Array.from(d.querySelectorAll<HTMLElement>('.contact-whatsapp'));
  const whatsappElementById = d.getElementById('contact-whatsapp');

  if (whatsappElements.length === 0 && whatsappElementById) {
    whatsappElements.push(whatsappElementById);
  }

  if (whatsappElements.length > 0 && whatsappE164Digits) {
    const whatsappNumber: string = whatsappE164Digits;

    // fixed icon location as requested (served from public/ as /icons/...)
    const iconPath = '/images/whatsapp.svg';

    const createAnchor = (): HTMLAnchorElement => {
      const whatsappAnchor: HTMLAnchorElement = d.createElement('a');
      whatsappAnchor.href = 'https://wa.me/' + whatsappNumber;
      whatsappAnchor.target = '_blank';
      whatsappAnchor.rel = 'nofollow noopener';

      // Display as inline-flex so the icon and text are vertically centered
      whatsappAnchor.style.display = 'inline-flex';
      whatsappAnchor.style.alignItems = 'center';
      // ensure compact vertical spacing so centering works consistently
      whatsappAnchor.style.lineHeight = '1';
      // small gap between number and icon (supported in modern browsers)
      (whatsappAnchor.style as any).gap = '0.4em';

      return whatsappAnchor;
    };

    whatsappElements.forEach((whatsappElement) => {
      const whatsappAnchor = createAnchor();
      whatsappAnchor.className = whatsappElement.className;

      const label = (whatsappElement.textContent || '').trim();

      // Show the formatted WhatsApp number as text first
      if (label) {
        whatsappAnchor.appendChild(d.createTextNode(label));
      } else {
        whatsappAnchor.appendChild(d.createTextNode(whatsappText));
      }

      // then append the icon
      const img = d.createElement('img');
      img.src = iconPath;
      img.alt = 'WhatsApp';
      // Use block display and alignSelf to ensure true centering inside flex container
      img.style.display = 'block';
      img.style.alignSelf = 'center';
      // set the icon height to match the line height and avoid manual translate nudges
      img.style.height = '1.6em';
      img.style.width = 'auto';
      // gap fallback for browsers without gap on inline-flex
      img.style.marginLeft = '0';

      whatsappAnchor.appendChild(img);

      // Replace the placeholder element with the constructed anchor
      whatsappElement.replaceWith(whatsappAnchor);
    });
  }
})();
