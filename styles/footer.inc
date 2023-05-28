footer {
  margin-top: 3em;
  background-color: var(--accent-darker);
  padding: 1em;
}

.site-footer {
  padding: 45px 0 20px;
  font-size: 15px;
  line-height: 24px;
  color: #737373;
  display: flex;
  padding: 4rem;
  justify-content: space-between;
}

.site-footer a {
  color: #737373;
}

.site-footer a:hover {
  color: #3366cc;
  text-decoration: none;
}

.footer-links {
  padding: 0;
  list-style: none;
  margin-right: 2px;
}

.footer-links li {
  display: block;
}

.footer-links a {
  color: #737373;
}

.footer-links a:active,
.footer-links a:focus,
.footer-links a:hover {
  color: var(--accent-lighter);
  text-decoration: none;
}

.footer-links.inline li {
  display: inline-block;
}

.copyright-text {
  text-align: center;
  font-size: 0.8em;
  margin-bottom: 0;
  color: var(--bg);
}

@media only screen and (max-width: 600px) {
  .site-footer {
    flex-direction: column;
    text-align: center;
  }

  .site-footer li {
    display: inline-block;
  }
}

/* vim: ft=css */
