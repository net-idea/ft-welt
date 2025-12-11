// ============================================================================
// NAVBAR UTILITIES
// Smooth scroll and other utility functions
// Bootstrap handles all dropdown functionality natively
// ============================================================================

document.addEventListener('DOMContentLoaded', () => {
  // Smooth scroll to top
  const scrollTopLinks = document.querySelectorAll<HTMLAnchorElement>('a[href="#header"]');
  scrollTopLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  });
});
