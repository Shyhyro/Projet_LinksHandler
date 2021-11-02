
let addLinkButton = document.getElementById('link-add-button');
let BackLink = document.getElementById('back_link');
let linkAddForm = document.getElementById('link-add-form');

let form = document.querySelector('#link-add-form form');
let submitButton = form.querySelector('button[type="submit"]');

addLinkButton.addEventListener('click', function ()
{
    linkAddForm.style.display = "flex";
});

BackLink.addEventListener('click', function ()
{
    linkAddForm.style.display = "none";
});


/**
 * Récupération de la liste au click du bouton.
 */
function linkActualisation () {
    let xhr = new XMLHttpRequest();
    xhr.onload = function () {
        let links = JSON.parse(xhr.responseText);
        let div = document.getElementById("littleBody");
        div.innerHTML = "";
        for(let link of links) {
            div.innerHTML += `
                <div class="linkImage">
                    <div class="image"><img src="/document/placeholder.png" alt="Placeholder, image temporaire."></div>
                    <div class="linkName"><a href="${link.href}" target="${link.target}">${link.title}</a></div>
                </div>
            `
        }
    }
    xhr.open("GET", "../api/links/index.php");
    xhr.send();
}

linkActualisation();

function resetInput ()
{
    form.querySelector('input[name="href"]').value = "";
    form.querySelector('input[name="title"]').value = "";
    form.querySelector('input[name="name"]').value = "";
}

// Sending form.
submitButton.addEventListener('click', function(e)
{
    e.preventDefault();
    const href = form.querySelector('input[name="href"]').value;
    const title = form.querySelector('input[name="title"]').value;
    let target = form.querySelector('select[name="target"]');
    const name = form.querySelector('input[name="name"]').value;
    target = target.options[target.selectedIndex].value;

    if(!href || !title || !target || !name )
    {
        console.log("All data are not set");
    }
    else
    {
        let xhr = new XMLHttpRequest();
        xhr.responseType = "json";
        xhr.open('POST', '/api/links/index.php');

        xhr.send(JSON.stringify({
            href: href,
            title: title,
            target: target,
            name: name
        }));

        linkActualisation();
        resetInput();
    }
});