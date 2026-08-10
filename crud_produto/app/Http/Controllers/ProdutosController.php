<?php
 
// Localização do arquivo dentro do projeto
namespace App\Http\Controllers;
 
// Importa o Model Pessoa
// Será usado para acessar o banco de dados
use App\Models\Produtos;
 
// Importa o Request
// Ele recebe os dados enviados pelo usuário
use Illuminate\Http\Request;
 
// Cria o Controller da Pessoa
class ProdutosController extends Controller
{
    /*
     * FUNÇÃO LISTAR
     * Responsável por buscar todas as pessoas cadastradas.
     */
    public function index()
    {
        // Busca todos os registros da tabela "produtos" no banco
        $produtos = produtos::all();
 
        // Retorna os dados encontrados em formato JSON para o Vue.js
        return response()->json($produtos);
    }
 
    /*
     * FUNÇÃO CADASTRAR
     * Recebe os dados enviados pelo Vue e salva no banco.
     */
    public function store(Request $request)
    {
        // Cria um novo registro utilizando o nome recebido
        $produtos  = produtos::create([
            'nome' => $request->nome , // Valor enviado pelo formulário
            'preco' => $request->preco , // Valor enviado pelo formulário
            'quantidade' => $request->quantidade // Valor enviado pelo formulário
        ]);
 
        // Retorna a produtos cadastrada para o Vue.js
        return response()->json($produtos);
    }
 
    /*
     * FUNÇÃO EXCLUIR
     * Remove uma produtos pelo ID.
     */
    public function destroy($id)
    {
        // Procura uma produtos no banco utilizando o ID recebido
        $produtos = produtos ::find($id);
 
        // Exclui o registro encontrado
        $produtos->delete();
 
        // Retorna uma mensagem informando sucesso
        return response()->json([
            'mensagem' => 'produtos excluído'
        ]);
    }
}
