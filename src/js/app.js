document.addEventListener("DOMContentLoaded", () => {
  eventListeners();

  darkMode();
});

const darkMode = () => {
  const prefiereDarkMode = window.matchMedia("(prefers-color-schema: dark)");
  if (prefiereDarkMode.matches) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }

  prefiereDarkMode.addEventListener("change", () => {
    if (prefiereDarkMode.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  });

  const botonDarkMode = document.querySelector(".dark-mode-boton");
  console.log(prefiereDarkMode);

  botonDarkMode.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
  });
};

const eventListeners = () => {
  const mobileMenu = document.querySelector(".mobile-menu");

  mobileMenu.addEventListener("click", () => {
    const navegacion = document.querySelector(".navegacion");
    navegacion.classList.toggle("mostrar");
  });
};
