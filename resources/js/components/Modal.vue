<template>
    <transition name="modal-fade">
        <div class="modal-backdrop">
            <div class="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription">
                <header class="modal-header" id="modalTitle">
                    <slot name="header">
                        <div class="row text-center" style="margin-left: 2px; width: 100%;">
                            <div class="col-10 text-left"><h4>Criar novo imóvel</h4></div>

                            <div class="col-2 text-right">
                                <button type="button" class="btn-close" @click="close" aria-label="Close modal">x</button>
                            </div>
                        </div>
                    </slot>
                </header>
                <section class="modal-body" id="modalDescription">
                    <slot name="body">
                        <form @submit.prevent="createImovel">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="emailProprietario">Email do proprietário</label>
                                    <input type="email" class="form-control" v-model="imovel.emailProprietario" id="emailProprietario" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-row mt-2">
                                <div class="form-group col-md-6">
                                    <label for="estado">Estado</label>
                                    <input type="text" class="form-control" v-model="imovel.estado" id="estado" placeholder="Rio de Janeiro">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cidade">Cidade</label>

                                    <input type="text" class="form-control" v-model="imovel.cidade" id="cidade" placeholder="Niterói">
                                </div>
                            </div>

                            <div class="form-row mt-2">
                                <div class="form-group col-md-6">
                                    <label for="rua">Rua</label>
                                    <input type="text" class="form-control" v-model="imovel.rua" id="rua" placeholder="Rua Visconde Jr.">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="numero">Número</label>

                                    <input type="text" class="form-control" v-model="imovel.numero" id="numero" placeholder="1039">
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="form-group col-md-12">
                                    <label for="complemento">Complemento</label>

                                    <input type="text" class="form-control" v-model="imovel.complemento" id="complemento" placeholder="Apartamento 203, Cada dos fundos, escritório e etc">
                                </div>
                            </div>
                        </form>
                    </slot>
                </section>
                <footer class="modal-footer">
                    <slot name="footer">
                        <button type="button" class="btn-green" @click="close" aria-label="Fechar modal">Fechar</button>
                        <button type="button" class="btn-green" @click="createImovel" aria-label="Criar imovel">Criar imovel</button>
                    </slot>
                </footer>
            </div>
        </div>
    </transition>
</template>

<style>
    .modal-fade-enter,
    .modal-fade-leave-active {
        opacity: 0;
    }

  .modal-fade-enter-active,
  .modal-fade-leave-active {
    transition: opacity .5s ease
  }

  .modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal {
    width: 500px;
    height: 520px;
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    position: absolute;
    float: left;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }

  .modal-header {
    border-bottom: 1px solid #4AAE9B;
    color: #4AAE9B;
  }

  .modal-footer {
    border-top: 1px solid #4AAE9B;
    justify-content: flex-end;
  }

  .modal-body {
    position: relative;
    padding: 20px 10px;
  }

  .btn-close {
    border: none;
    font-size: 20px;
    margin: 0;
    padding: 0;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
  }
</style>

<script>
  export default {
    name: 'modal',

    props: [
        'csrf_token'
    ],

    data: () => {
        return {
            imovel: {
                emailProprietario: '',
                estado: '',
                cidade: '',
                rua: '',
                numero: '',
                complemento: ''
            }
        }
    },

    methods: {
      close() {
        this.$emit('close');
      },

    createImovel() {
        fetch('/imovel', {
            method: 'POST',
            body: JSON.stringify(this.imovel),
            headers: {
                'content-type': 'application/json',
                'X-CSRF-Token': this.csrf_token
            }
        })
        .then(result => result.json())
        .then(data => {
            this.$emit('createImovel');

            this.close();
        })
        .catch(err => console.log(err));
      }
    },
  };
</script>