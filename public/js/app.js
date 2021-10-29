
let form = document.querySelector('#link-add-form form');
let submitButton = form.querySelector('button[type="submit"]');

/**
 * Ajout d'un lien en base de données.
 */
// Affichage du form d'ajout d'un lien.
document.getElementById('link-add-button').addEventListener('click', function()
{
    form.parentElement.style.display = 'block';
});

// Sending form.
submitButton.addEventListener('click', function(e)
{
    e.preventDefault();
    const href = form.querySelector('input[name="href"]').value;
    const title = form.querySelector('input[name="title"]').value;
    let target = form.querySelector('select[name="target"]');
    const name = form.querySelector('input[name="name"]').value;
    target = target.options[target.selectedIndex].value;

    if(!href || !title || !target || !name)
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

        xhr.onload = function ()
        {
            const response = xhr.response;
            if(response.hasOwnProperty('error') && response.hasOwnProperty('message'))
            {
                const div = document.createElement('div');
                div.classList.add('alert', `alert-${response.error}`);
                div.setAttribute('role', 'alert');
                div.innerHTML = response.message;
                document.body.appendChild(div);
            }
        }
    }
});


/**
 * Récupération de la liste au click du bouton.
 */
let linksListButton = document.getElementById('links-list');
linksListButton.addEventListener('click', function(e)
{
    let xhr = new XMLHttpRequest();
    xhr.onload = function()
    {
        const links = JSON.parse(xhr.responseText);
        const table = document.querySelector('#link-list-content');
        table.innerHTML = '';

        for(let link of links)
        {
            table.innerHTML += `
                <div class="linkImage">
                    <div class="image"><img src="/document/placeholder.png" alt="Placeholder, image temporaire."></div>
                    <div class="linkName"><a href="${link.href}" target="${link.target}">${link.title}</a></div>
                </div>
            `;
        }

        table.parentElement.style.display = 'table';
    };

    xhr.open('GET', '/api/links/index.php');
    xhr.send();
});