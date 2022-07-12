document.addEventListener("DOMContentLoaded", () => {
    const field = document.querySelector("[name=field]");
    const type = document.querySelector("[name=type]");
    const form = document.querySelector("form");

    field && field.addEventListener("change", (e) => {
        if (form) {
            form.submit();
        }
    });

    type && type.addEventListener("change", (e) => {
        if (form) {
            form.submit();
        }
    });
})