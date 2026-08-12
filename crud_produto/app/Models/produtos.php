<?php
 
// Define o namespace (localização) da classe dentro do projeto
namespace App\Models;
 
// Importa a classe Model do Laravel
// Ela permite que nossa classe converse com o banco de dados
use Illuminate\Database\Eloquent\Model;
 
// Cria a classe Pessoa, que representa a tabela "pessoas"
class produtos extends Model
{
    // Define quais campos podem receber informações
    // através de cadastro ou atualização (mass assignment)
    protected $fillable = [
        'id',//Campo que será salvo no banco de dados
        'nome', // Campo que será salvo no banco de dados
        'preco', // Campo que será salvo no banco de dados
        'quantidade'// Campo que será salvo no banco de dados
    ];
}