form {
  max-width: 600px;
  margin: 0 auto;
}

.form-control {
  position: relative;
  margin-bottom: 20px;
}

input:not([type="radio"], [type="checkbox"], [type="file"]),
textarea,
select {
  /* default settings for input with border and darker background */
  border: 2px solid gray;
  border-radius: 5px;
  background-color: var(--bg-input);
  /* bigger default input */
  padding: 1rem 0.6rem;
  /* remove default outline but still keep it for constrasted theme */
  outline-color: transparent;
  transition: padding 0.4s;
  font-size: 1em;
  width: 100%;
}

input:focus {
  outline-color: transparent;
}

input:disabled ~ * {
  opacity: 0.3;
  user-select: none;
  pointer-events: none;
}

textarea {
  height: auto;
  min-height: 100px;
}

textarea::-webkit-scrollbar {
  display: none;
}

/* material input */
select:invalid + label,
textarea:placeholder-shown + label,
input:not([type="radio"], [type="checkbox"], [type="file"]):placeholder-shown
  + label {
  color: #aaa;
  font-size: 1rem;
  top: 1.2rem;
  left: 1em;
}

select + label,
textarea + label,
input:not([type="radio"], [type="checkbox"], [type="file"]) + label,
textarea:focus + label,
input:not([type="radio"], [type="checkbox"], [type="file"]):focus + label {
  color: var(--accent);
  font-size: 0.6em;
  pointer-events: none;
  position: absolute;
  top: 5px;
  left: 1em;
  transition: top 0.4s, left 0.4s, font-size 0.4s;
}

textarea::placeholder,
input:not([type="radio"], [type="checkbox"], [type="file"])::placeholder {
  color: transparent;
}

select:valid,
textarea:focus,
textarea:not(:placeholder-shown),
input:not([type="radio"], [type="checkbox"], [type="file"]):focus,
input:not([type="radio"], [type="checkbox"], [type="file"]):not(
    :placeholder-shown
  ) {
  border: 2px solid var(--accent);
  outline: none;
  padding: 1em 0.6em;
}

/* checkbox */
input[type="checkbox"].checkbox {
  display: none;
}

input[type="checkbox"].checkbox + label {
  position: relative;
  vertical-align: middle;
  cursor: pointer;
  font-weight: 500;
  padding-left: 35px;
}

input[type="checkbox"].checkbox + label span.box {
  display: inline-block;
  width: 20px;
  border-radius: 5px;
  border: 1px solid black;
  width: 24px;
  height: 24px;
  vertical-align: middle;
  margin-right: 3px;
  transition: 0.3s ease;
  position: absolute;
  left: 0;
}

input[type="checkbox"].checkbox + label span.box:before,
input[type="checkbox"].checkbox + label span.box:after {
  content: "";
  position: absolute;
  width: 4px;
  height: 16px;
  border-radius: 40px;
  background: var(--bg);
  transition: all 0.3s ease;
}

input[type="checkbox"].checkbox + label span.box:before {
  transform: rotate(45deg) translateY(-5px) translateX(10px) scale(0);
}

input[type="checkbox"].checkbox + label span.box:after {
  height: 8px;
  transform: rotate(-45deg) translateY(10px) translateX(-4px) scale(0);
}

input[type="checkbox"].checkbox:checked + label span.box {
  background: var(--accent);
  border-color: var(--accent);
}

input[type="checkbox"].checkbox:checked + label span.box:before {
  transform: rotate(45deg) translateY(-5px) translateX(10px) scale(1);
}

input[type="checkbox"].checkbox:checked + label span.box:after {
  height: 8px;
  transform: rotate(-45deg) translateY(10px) translateX(-4px) scale(1);
}

input[type="checkbox"].checkbox:disabled:checked + label span.box {
  background: var(--bg);
  border: var(--bg);
}

input[type="checkbox"].checkbox:disabled:checked + label:before,
input[type="checkbox"].checkbox:disabled:checked + label:after {
  background: black;
}

/* radio buttons */
fieldset {
  display: flex;
  border: 2px solid gray;
  border-radius: 5px;
  background-color: var(--bg-input);
  align-items: center;
  justify-content: space-around;
  width: 100%;
}

fieldset .form-control {
  margin-bottom: 0;
  text-align: center;
}

fieldset legend {
  font-family: var(--font-sans);
  font-size: 0.8em;
  padding: 0 3px;
}

input[type="radio"].radio {
  display: none;
}

input[type="radio"].radio:checked + label:after {
  transform: scale(1);
}

input[type="radio"].radio:checked + label {
  color: black;
}

input[type="radio"].radio + label {
  color: #aaa;
  position: relative;
  padding-left: 24px;
  cursor: pointer;
}

input[type="radio"].radio + label:before {
  content: "";
  position: absolute;
  width: 16px;
  height: 16px;
  border: 1.3px solid #aaa;
  border-radius: 50%;
  left: 0;
  top: calc(50% - 8px);
}

input[type="radio"].radio + label:after {
  content: "";
  position: absolute;
  width: 12px;
  height: 12px;
  top: calc(50% - 8px + 2px);
  left: 2px;
  background: var(--accent);
  border-radius: 50%;
  transform: scale(0);
  transition: 0.3s ease;
}

@media only screen and (max-width: 600px) {
  input[type="radio"].radio + label:before {
    left: 2px;
    top: calc(25% - 8px);
  }

  input[type="radio"].radio + label:after {
    left: 4px;
    top: calc(25% - 8px + 2px);
  }
}

/* vim: ft=css */
