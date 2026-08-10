<?php
 
// Localização do arquivo dentro do projeto
namespace App\Http\Controllers;
 
// Importa o Model alunos
// Será usado para acessar o banco de dados
use App\Models\alunos;
 
// Importa o Request
// Ele recebe os dados enviados pelo usuário
use Illuminate\Http\Request;
 
// Cria o Controller da alunos
class AlunosController extends Controller
{
    /*
     * FUNÇÃO LISTAR
     * Responsável por buscar todas as alunos cadastradas.
     */
    public function index()
    {
        // Busca todos os registros da tabela "alunos" no banco
        $alunos = Alunos::all();
 
        // Retorna os dados encontrados em formato JSON para o Vue.js
        return response()->json($alunos);
    }
 
    /*
     * FUNÇÃO CADASTRAR
     * Recebe os dados enviados pelo Vue e salva no banco.
     */
    public function store(Request $request)
    {
        // Cria um novo registro utilizando o nome recebido
        $alunos = Alunos::create([
            'nome' => $request->nome // Valor enviado pelo formulário
        ]);
 
        // Retorna a pessoa cadastrada para o Vue.js
        return response()->json($alunos);
    }
 
    /*
     * FUNÇÃO EXCLUIR
     * Remove uma pessoa pelo ID.
     */
    public function destroy($id)
    {
        // Procura uma pessoa no banco utilizando o ID recebido
        $alunos = Alunos::find($id);
 
        // Exclui o registro encontrado
        $alunos->delete();
 
        // Retorna uma mensagem informando sucesso
        return response()->json([
            'mensagem' => 'Aluno excluído'
        ]);
    }
}