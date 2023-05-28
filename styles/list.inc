ul,
ol {
  margin-block-start: var(--stack);
}

/* make list character start at the normal
* position like other texts */
li {
  margin-inline-start: 2ch;
}

dl {
  display: grid;
  grid-template-columns: auto minmax(75%, 1fr);
  gap: calc(var(--gutter) / 2);
  align-items: baseline;
  padding-block-start: calc(var(--stack) / 2.5);
}

dd {
  block-size: 100%;
  border-image-slice: 1;
  padding-block: calc(var(--stack) / 6);
  padding-inline: calc(var(--gutter) / 3);
}

dt {
  /* no actual common size 
*  The common size is from
*  the grid on dl
*  which is 25%*/
  text-decoration: underline;
  text-decoration-style: dotted;
  text-underline-offset: 0.3ex;
}

/* vim: ft=css */
