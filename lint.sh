#!/bin/bash

# Lint Stylesheet files
yarn run lint:css:fix

# Type check TypeScript files
yarn run tsc:check

# Run prettier to check and format files
npx prettier --check . --write

# Lint Twig files
php bin/console lint:twig templates

./php-cs-fixer.sh
