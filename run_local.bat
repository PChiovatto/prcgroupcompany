@echo off
REM PRC Group - start a local PHP server for development.
REM Requires PHP in PATH (installed via: winget install PHP.PHP.8.3)

cd /d "%~dp0"
echo.
echo  PRC Group - local server
echo  ------------------------
echo  URL:  http://localhost:8000
echo  Stop: press Ctrl+C
echo.
php -S localhost:8000
pause
