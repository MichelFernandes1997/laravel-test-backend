<template>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item mr-2">
                <a class="nav-link disabled text-white-50" href="#">
                    <h5>Accourdous Test</h5>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link btn btn-link"  @click="showModal">Contratos</button>
                <modal-component v-show="isModalVisible" :csrf_token="csrf_token" @createContrato="createdContrato" @close="closeModal">
                    <template #header="{ close }">
                       <div class="row text-center" style="margin-left: 2px; width: 100%;">
                            <div class="col-10 text-left"><h4>Criar novo contrato</h4></div>

                            <div class="col-2 text-right">
                                <button type="button" class="btn-close" @click="close" aria-label="Close modal">x</button>
                            </div>
                        </div>
                    </template>
                    <template #body="{ createContrato, contrato, mascaraCpfCnpj, radioTipoPessoa }">
                        <form @submit.prevent="createContrato">
                            <div class="form-row">
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="pessoaFisica" name="tipo_pessoa" class="form-check-input" value="0" @change="radioTipoPessoa($event)" v-model="contrato.tipo_pessoa">
                                    <label class="form-check-label" for="pessoaFisica">Pessoa Física</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="pessoaJuridica" name="tipo_pessoa" class="form-check-input" value="1" @change="radioTipoPessoa($event)" v-model="contrato.tipo_pessoa">
                                    <label class="form-check-label" for="pessoaJuridica">Pessoa Jurídica</label>
                                </div>
                            </div>

                            <div class="form-row mt-4">
                                <div class="form-group col-md-6" v-if="contrato.tipo_pessoa === '0'" >
                                    <label for="cpf">Documento</label>
                                    <input type="text" class="form-control"  v-model="contrato.documento" @keyup="mascaraCpfCnpj($event)" id="cpf" placeholder="CPF">
                                </div>
                                <div class="form-group col-md-6" v-else >
                                    <label for="cnpj">Documento</label>
                                    <input type="text" class="form-control"  v-model="contrato.documento" @keyup="mascaraCpfCnpj($event)" id="cnpj" placeholder="CNPJ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailContratante">Email do Contratante</label>

                                    <input type="text" class="form-control" v-model="contrato.emailContratante" id="emailContratante" placeholder="fulano.acessoria@live.com">
                                </div>
                            </div>

                            <div class="form-row mt-2">
                                <div class="form-group col-md-6">
                                    <label for="nomeContratante">Nome Completo</label>
                                    <input type="text" class="form-control" v-model="contrato.nomeContratante" id="nomeContratante" placeholder="Ciclano Fernandes da Silva">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="imovel_id">Imóveis</label>

                                    <input type="text" class="form-control" v-model="contrato.imovel_id" id="imovel_id" placeholder="Escolha o imóvel">
                                </div>
                            </div>
                        </form>
                    </template>
                    <template #footer="{ close, createContrato }">
                        <button type="button" class="btn-green" @click="close" aria-label="Fechar modal">Fechar</button>
                        <button type="button" class="btn-green" @click="createContrato" aria-label="Criar imovel">Criar contrato</button>
                    </template>
                </modal-component>
            </li>
        </ul>
    </nav>
</template>

<script>
import modal from './Modal.vue';

    export default {
        props: [
            'csrf_token'
        ],

        components: {
            modal,
        },

        mounted() {
            console.log('mounted')
        },

        data: () => {
            return {
                isModalVisible: false,
            }
        },

        methods: {
            createdContrato() {
                this.$toasted.success('Contrato criado com sucesso')

                this.$root.$refs.imovel.fetchImoveis();
            },

            showModal() {
                this.isModalVisible = true;
            },

            closeModal() {
                this.isModalVisible = false;
            }
        }
    }
</script>