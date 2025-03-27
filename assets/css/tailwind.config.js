/** @type {import('tailwindcss').Config} */

const node = '../../build/node_modules/';
const defaultTheme = require(node + 'tailwindcss/defaultTheme')

// Gap - 160 / 80 / 40 / 20

module.exports = {
	content: [
		'./../assets/css/**/*',
		'./../*.php',
		'./../components/**/*.php',
		'./../pages/**/*.php',
		'./../functions/**/*.php',
		'./../assets/js/**/*.js',
		'!./../assets/css/style.css',
	],
	theme: {
		screens: {
			'xs': '420px',
			...defaultTheme.screens,
			'3xl': '1921px'
		},
		extend: {
			fontFamily: {
				'pjs': ['Plus Jakarta Sans', 'sans-serif'],
				'agn': ['agn', 'sans-serif'],
			},
			height: {
				// screen: ['100vh', '100svh'],
			},
			minHeight: {
				// screen: ['100vh', '100svh'],
			},
		},
		colors: {
			transparent: 'transparent',
			'charcoal': '#212125',
			'blue': '#272CC5',
			'lightBlue': '#5C95ED',
			'red': '#DF0D29',
			'beige': '#EEE9D2',
			'darkBeige': '#CBC6AD',
		},
	},
	plugins: [
	],
}