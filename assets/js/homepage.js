const url = window.location.href;
const index = url.indexOf("category=");

if (index > 0) {
  const category = url.slice(47, url.length);

  console.log(category);
}
