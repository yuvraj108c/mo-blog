const url = window.location.href;
const index = url.indexOf("category=");

let http = new XMLHttpRequest();
if (index > 0) {
  const category = url.slice(47, url.length);
  const url2 =
    "http://localhost/mo-blog/includes/handlers/category-handler.php?category=" +
    category;

  http.open("GET", url2, true);

  http.onreadystatechange = displayPosts;

  http.send();
}

function displayPosts() {
  if (http.readyState == 4 && http.status == 200) {
    const doc = http.responseXML;
    const posts = doc.getElementsByTagName("posts")[0].childNodes;

    let output = "";

    for (let i = posts.length - 1; i >= 0; i--) {
      const p = posts[i];

      const id = p.getElementsByTagName("id")[0].childNodes[0].nodeValue;
      const title = p.getElementsByTagName("title")[0].childNodes[0].nodeValue;
      const description = p.getElementsByTagName("description")[0].childNodes[0]
        .nodeValue;
      const category = p.getElementsByTagName("category")[0].childNodes[0]
        .nodeValue;
      const imageUrl = p.getElementsByTagName("imageUrl")[0].childNodes[0]
        .nodeValue;
      const author = p.getElementsByTagName("author")[0].childNodes[0]
        .nodeValue;
      const createdOn = p.getElementsByTagName("createdOn")[0].childNodes[0]
        .nodeValue;

      output += `<div class="item">
      <div class="ui small image">
      <img src="${imageUrl}" />
    </div>
    <div class="content">
        <div class="header">
        <a href="details.php?id=${id}">
                ${title}
                </a>
                </div>
                <div class="meta">
                <span class="cinema">
                By
                ${author}
                </span>
                </div>
                <div class="description">
                <p>
                ${description}
                </p>
                </div>
                <div class="extra">
                <span class="date">
                <i class="left calendar icon"></i>
                ${createdOn}
            </span>
            <span class="ui label">
            ${category}
            </span>
            </div>
    </div>
    </div>`;
    }

    document.getElementById("posts").innerHTML = output;
  }
}
