# Buscador de Cursos da Alura

Esta biblioteca é útil para listar os cursos de PHP disponíveis na plataforma Alura.

Este projeto foi desenvolvido no curso **PHP Composer: Dependências, Autoload e Publicação.**, ministrado pelo instrutor **Vinicius DIas**.

# Instruções

Para utilizar essa biblioteca, é necessário ter o PHP e o Composer instalado no seu computador.
* Crie um novo projeto em seu editor de texto favorito.
* No Terminal, vá até a pasta do projeto e digite: <br>
`composer require willliamtome/buscador-cursos-alura`
* Para usar a biblioteca, execute este comando:<br>
`vendor/bin/search-courses.php`

Obs.: Se você deseja usar esta biblioteca num projeto que usa Docker, execute este comando: `docker container run --rm -itv $PWD:/${PWD##*/} -w /learn-composer composer <qualquer-um-dos-comandos-acima>`