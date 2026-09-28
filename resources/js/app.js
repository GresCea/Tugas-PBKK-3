const themeToggle = document.querySelector('#theme-toggle');

if (themeToggle) {
	const savedTheme = window.localStorage.getItem('theme');
	const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
	const isDark = savedTheme ? savedTheme === 'dark' : prefersDark;

	document.documentElement.classList.toggle('dark', isDark);
	document.body.classList.toggle('dark', isDark);
	themeToggle.setAttribute('aria-pressed', String(isDark));
	themeToggle.textContent = isDark ? 'Mode Terang' : 'Mode Gelap';

	themeToggle.addEventListener('click', () => {
		const nextIsDark = !document.documentElement.classList.contains('dark');

		document.documentElement.classList.toggle('dark', nextIsDark);
		document.body.classList.toggle('dark', nextIsDark);
		window.localStorage.setItem('theme', nextIsDark ? 'dark' : 'light');
		themeToggle.setAttribute('aria-pressed', String(nextIsDark));
		themeToggle.textContent = nextIsDark ? 'Mode Terang' : 'Mode Gelap';
	});
}
