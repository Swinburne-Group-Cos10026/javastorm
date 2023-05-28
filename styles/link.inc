a {
  color: inherit;
  text-decoration: none;
}

/* Underline styles - details of technique here: https://nickymeuleman.netlify.app/blog/css-animated-wrapping-underline */
a.link {
  background: linear-gradient(
      to right,
      rgba(100, 200, 200, 1),
      rgba(100, 200, 200, 1)
    ),
    linear-gradient(
      to right,
      rgba(255, 0, 0, 1),
      rgba(255, 0, 180, 1),
      rgba(0, 100, 200, 1)
    );
  background-size: 100% 0.1em, 0 0.1em;
  background-position: 100% 100%, 0 100%;
  background-repeat: no-repeat;
  transition: background-size 400ms;
}

a.link:hover,
a.link:focus {
  background-size: 0 0.1em, 100% 0.1em;
}

/* use class instead of the element button
* since we can have button as input or a tag */
.btn {
  position: relative;
  font-size: 0.8em;

  display: block;
  margin: 30px auto;
  padding: 1.5em 1em;

  overflow: hidden;

  border-width: 0;
  outline: none;
  border-radius: 2px;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.6);

  background-color: var(--accent);
  color: #ecf0f1;

  transition: background-color 0.3s;
}

.btn:hover,
.btn:focus {
  filter: brightness(85%);
}

.btn > * {
  position: relative;
}

.btn span {
  display: block;
  padding: 12px 24px;
}

.btn:before {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  display: block;
  width: 0;
  padding-top: 0;
  border-radius: 100%;
  background-color: var(--bg-input);
  transform: translate(-50%, -50%);
}

.btn:active:before {
  width: 120%;
  padding-top: 120%;

  transition: width 0.2s ease-out, padding-top 0.2s ease-out;
}

/* vim: ft=css */
