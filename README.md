# LibraryMC
Este projeto é sobre um sistema de controle bibliotecário. Nesse sistema podemos controlar os empréstimos de livros de uma biblioteca.
<h2>Serão 7 páginas para o Funcionário</h2>
<h3>1.Meus Dados</h3>
Nessa página será possível visualizar, alterar e excluir os dados do perfil.
<h3>2.Cadastrar Livro</h3>
Nessa página será possível cadastrar um novo livro no sistema.
<h3>3.Listar Livros</h3>
Nessa página será possível visualizar todos os livros disponíveis no sistema.
<h3>4.Realizar Empréstimo</h3>
Nessa página será possível registrar o empréstimo de um livro na base de dados do sistema.
<h3>5.Realizar Devolução</h3>
Nessa página será possível registrar a devolução de um livro na base de dados do sistema.
<h3>6.Gerar Relatório de Empréstimo</h3>
Nessa página o sistema mostrará uma lista de empréstimos e devoluções em um único dia.
<h3>7.Página Principal</h3>
Será a página inicial/principal do funcionário.

<h2>Serão 3 páginas para o estudante:</h2>
<h3>1.Meus Dados</h3>
Nessa página será possível visualizar, alterar e excluir os dados do perfil.
<h3>2.Listar Livros</h3>
Nessa página será possível visualizar todos os livros disponíveis no sistema.
<h3>3.Página Principal</h3>
Será a página inicial/principal do funcionário.
<h2>Linguagens utilizadas: </h2><p>HTML5, CSS3, PHP7.4.26 e MySQL5.7.36</p>

<h2>Código</h2>
<h3>Pastas</h3>
<h4>Controller</h4>
Código responsável por receber os dados que vem do formulário e decidir a partir do formulário como ele irá controlar a sequencia dos métodos que serão chamados.
Ex: C_CadastroCliente.php, C_ConsultarCliente.php, etc...
("C_" = Padrão para representar Controller)
<h4>View</h4>
Tudo que estiver relacionado a interface. Por exemplo, o formulário que o cliente interagir estará nesta pasta.
Ex: CadastroCliente.html, ConsultarCliente.html, etc..
<h4>Model</h4>
Representação das classes. Dentro do model definimos quais são os atributos, métodos, etc...
Ex: Cliente.php, Venda.php, Fornecedor.php, etc..
<h4>Persistence</h4>
Persistencia dos dados. Para todo Model teremos um DAO(Data Access Object). Toda operação feita no banco de dados terá uma classe especifica para conectar o banco de dados e salvar. As operações de CADASTRAR, ALTERAR, EXCLUIR estarão efetivamente dentro do DAO.
Ex: ClienteDAO, VendaDAO, FornecedorDAO
