if (!window.localStorage.getItem("theme")) {
  window.localStorage.setItem("theme", "light");
} else {
  document.documentElement.setAttribute(
    "theme",
    window.localStorage.getItem("theme")
  );
}
