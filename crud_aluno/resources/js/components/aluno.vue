<template>
    <!-- Container principal da tela, usando classes do Bootstrap -->
    <div class="container mt-4">
        <!-- Título da página -->
        <h1 class="mb-4">Cadastro de Aluno</h1>

        <!-- Formulário de cadastro -->
        <div class="input-group mb-4">
            <!-- Campo de entrada do nome -->
            <!-- v-model liga o campo com a variável "nome" do JavaScript -->
            <input
                v-model="nome"
                placeholder="Digite o nome"
                class="form-control"
            />

            <!-- Botão que chama a função salvar() ao ser clicado -->
            <button @click="salvar" class="btn btn-primary">Cadastrar</button>
        </div>

        <h2>Lista de Aluno</h2>

        <!-- Lista de aluno cadastradas -->
        <ul class="list-group">
            <!--
        v-for percorre o array "aluno"
        Para cada alunos, cria um item de lista
        :key ajuda o Vue a identificar cada item de forma única
      -->
            <li
                v-for="aluno in aluno"
                :key="Aluno.id"
                class="list-group-item d-flex justify-content-between align-items-center"
            >
                <!-- Mostra o nome da aluno -->
                {{ aluno.nome }}

                <!-- Ao clicar, envia o ID da aluno para a função excluir() -->
                <button
                    @click="excluir(aluno.id)"
                    class="btn btn-sm btn-danger"
                >
                    Excluir
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
// Importa o Axios, biblioteca usada para fazer requisições HTTP
 import axios from "axios";

 export default {
    data() {
        return {
            nome: "", // Guarda o nome digitado no formulário
            alunos: [], // Guarda a lista de alunos vindas do banco
        };
    },

    // mounted() é executado automaticamente quando o componente é carregado
    mounted() {
        this.listar();
    },

    methods: {
        // Busca a lista de alunos cadastradas no Laravel
        async listar() {
            // Faz uma requisição GET para a API do Laravel
            const resposta = await axios.get(
                "http://localhost:8000/api/alunos",
            );

            // Guarda os dados recebidos na variável "aluno"
            this.aluno = resposta.data;
        },

        // Envia um novo cadastro para o Laravel
        async salvar() {
            // Envia o nome digitado para a API do Laravel
            await axios.post("http://localhost:8000/api/alunos", {
                nome: this.nome,
            });

            // Limpa o campo após salvar
            this.nome = "";

            // Atualiza a lista aluno
            this.listar();
        },

        // Remove uma aluno pelo ID
        async excluir(id) {
            // Envia o ID para a API excluir o registro
            await axios.delete(`http://localhost:8000/api/alunos/${id}`);

            // Atualiza a lista depois da exclusão
            this.listar();
        },
    },
 };
</script>