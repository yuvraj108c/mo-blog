document.addEventListener("DOMContentLoaded", e => {
  const categoryBtn = document.getElementsByClassName("category");
  let http;
  let currentBtn = "";

  Array.from(categoryBtn).forEach(b => {
    setInterval(() => {
      if (b.textContent !== currentBtn) {
        b.classList.remove("teal");
      }
    }, 100);

    b.addEventListener("click", e => {
      e.target.classList.add("teal");
      getPosts(e.target.textContent);
      currentBtn = e.target.textContent;
    });
  });
});

function getPosts(category) {
  http = new XMLHttpRequest();
  let url =
    "http://localhost/mo-blog/includes/handlers/category-handler.php?category=" +
    category;

  http.open("GET", url, true);

  http.onreadystatechange = displayPosts;

  http.send();
}

function displayPosts() {
  if (http.readyState == 4 && http.status == 200) {
    const doc = http.responseXML;
    const posts = doc.getElementsByTagName("posts")[0].childNodes;

    let output = "<div class = 'ui divided items'>";

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
    </div>
    `;
    }

    output += "</div>";

    document.getElementById("content").innerHTML = output;
  }
}
