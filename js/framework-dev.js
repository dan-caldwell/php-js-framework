(() => {
    // We can find unused styles on the page
    const tailwindStylesheet = [...document.querySelectorAll('style')].filter(element => element.innerText.includes('--tw'))[0];
    if (!tailwindStylesheet) return;
})();

