/*
* which means we can easily override them in the future for testing or special case purpose
*/

/* Use open sans font for sans and Oswald for heading */
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400;1,600&family=Oswald&display=swap");

/* config like colour, theme, font, etc. 
* use css variables
* -> easier to change later on since they are
*		at the top of the file
* -> can reuse
* */
:root {
  /* setting default and global variable for typography */
  --gutter: clamp(4ch, 3.5vmax, 4.75ch);
  --stack: clamp(1.25ex, 2.5vmax, 1.75ex);
  --paragraph-indent: calc(var(--gutter) / 1.3);
  --line-length: 60ch;
  --font-serif: "Georgia", serif;
  --font-sans: "Open Sans", "Verdana", system-ui, sans-serif;
  --font-mono: ui-monospace, SFMono-Regular, SF Mono, Menlo, Consolas,
    Liberation Mono, monospace;
  --font-heading: "Oswald", "Impact";
  --pt-double-canon: 4.666em;
  --pt-canon: 3.999em;
  --pt-double-great-primer: 2.999em;
  --pt-double-pica: 2em;
  --pt-paragon: 1.666em;
  --pt-english: 1.166em;
  --pt-pica: 1em;
  --pt-small-pica: 0.916em;
  --pt-long-primer: 0.833em;
  --pt-bourgeois: 0.75em;
  font-family: var(--font-sans);
  /* flexible font-size with view port */
  font-size: clamp(100%, 70% + 0.5vw, 150%);
  /* easier to read with bigger line height */
  line-height: 1.3;

  /* Setting default theme for the web */
  color-scheme: light;
  /* default colour for default ui elements */
  --accent: #5382a1;
  --accent2: #f89820;
  --accent-lighter: #90bad6;
  --accent-darker: #17252e;
  --bg: aliceblue;
  --bg-darker: #e5e9f0;
  --bg-input: rgba(229, 233, 240, 0.1);
  accent-color: var(--accent);
}

/* default background colour - not #ffffff cause too bright */
body {
  background-color: var(--bg);
  padding: 0;
}

main {
  /* overflow-x: hidden; */
  padding: 0 10%;
	min-height: calc(100vh - 320px);
}

@media only screen and (max-width: 600px) {
  main {
    padding: 0 var(--paragraph-indent);
		text-align: justify;
  }
}

/* reset default css for all element with '*' */
*,
*::before,
*::after {
  /* use font-kernel if the font has support for it */
  font-feature-settings: "kern";
  font-kerning: normal;
  /* easier to manage width and height
		* when using margin or padding
		*/
  box-sizing: border-box;
}

/* default no margin and padding */
* {
  margin: 0;
  padding: 0;
}

/* config css for typical elements and state */
/* use accent colour when selecting */
*::selection {
  background: var(--accent);
}

*:focus-visible {
  outline: 2px solid currentcolor;
  outline-offset: 2px;
}

*:disabled {
  cursor: not-allowed;
  border-style: groove;
}

*[readonly] {
  border-style: dashed;
  background: transparent;
}

/* vim: ft=css */
