# Minimal Makefile to start the Laravel + Vite development servers

.PHONY: run build install-deps

install-deps:
	@echo "Checking/installing dependencies..."
	@if [ ! -d node_modules ]; then npm install; fi
	@if [ ! -d vendor ]; then composer install --no-interaction --prefer-dist; fi

run: install-deps
	@echo "Starting development servers..."
	# Start Laravel dev server in background, then start Vite dev server in foreground
	php artisan serve --host=127.0.0.1 --port=8000 >/dev/null 2>&1 & \
	npm run dev

build:
	@echo "Building assets for production..."
	npm ci
	npm run build
	@echo "Production build complete."
