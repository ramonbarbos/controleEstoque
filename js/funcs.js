const sidebar = document.getElementById('sidebar');
const sidebarToggle = document.getElementById('sidebar-toggle');
const tituloAba1 = document.getElementById('tituloAba1');
const tituloAba2 = document.getElementById('tituloAba2');
const tituloAba3 = document.getElementById('tituloAba3');

sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    sidebarToggle.classList.toggle('menu');
    tituloAba1.classList.toggle('none');
    tituloAba2.classList.toggle('none');
    tituloAba3.classList.toggle('none');
});

// Função para carregar o conteúdo da página com base na rota
function loadPage(page) {
	const xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.querySelector('main').innerHTML = this.responseText;
		}
	};
	xhttp.open('GET', page, true);
	xhttp.send();
}

// Definindo as rotas para cada página em seu site
const routes = {
	'/': 'src/pages/body.php',
	'/pendentes': 'src/pages/body&pendentes.php',
	'/new_produtos': 'src/pages/new_produtos.php',
	'/new_usuarios': 'src/pages/new_usuarios.php',
};

// Adicionando um evento de clique para cada link de navegação em sua barra lateral
const links = document.querySelectorAll('aside nav ul li a');
for (let i = 0; i < links.length; i++) {
	links[i].addEventListener('click', function(event) {
		event.preventDefault();
		loadPage(routes[event.target.getAttribute('href')]);
	});
}
