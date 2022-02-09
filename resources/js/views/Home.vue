<template>
     <div class="row vh-100">
        <div class="col-sm-8 m-auto">
            <div class="card border-light">
                <h5 class="card-header font-weight-bold">Form Registrasi</h5>
                <div class="card-body">
                     <b-form @submit.prevent="onSubmit" @reset="onReset">
                        <b-form-group id="input-group-1" label="Nama Lengkap" label-for="input-name"  >
                            <b-form-input
                                id="input-name"
                                v-model="form.name"
                                type="text"
                                placeholder="Masukan nama Anda"
                                required
                            />
                        </b-form-group>

                        <b-form-group id="input-group-2" label="Umur" label-for="input-umur">
                            <b-form-input
                                type="number"
                                id="input-umur"
                                v-model="form.age"
                                placeholder="Umur"
                                required
                            />
                        </b-form-group>
                        
                        <b-form-group id="input-group-3" label="Nomor Induk" label-for="input-nomor-induk">
                            <b-form-input
                                id="input-nomor-induk"
                                v-model="form.nik"
                                placeholder="xxxxxxxxxxxx"
                                required
                            />
                        </b-form-group>
                        
                        <b-form-group id="input-group-4" label="Tanggal Lahir" label-for="input-tgl-lahir">
                            <b-form-input
                                id="input-tgl-lahir"
                                v-model="form.ttl"
                                placeholder="xxxx - xx - xx"
                                required
                            />
                        </b-form-group>
                        
                        <b-form-group id="input-group-4" label="Alamat Rumah" label-for="input-tgl-lahir">
                            <b-form-textarea
                                id="input-tgl-lahir"
                                v-model="form.address"
                                placeholder="Alamat rumah"
                                rows="3"
                                max-rows="6"
                                required
                            />
                        </b-form-group>

                        <div class="text-right">
                            <b-button type="reset" variant="secondary">Reset</b-button>
                            <b-button type="submit" variant="primary">Submit</b-button>
                        </div>

                        <b-overlay :show="busy" no-wrap>
                            <template #overlay>
                                <div v-if="processing" class="text-center p-4 bg-primary text-light rounded">
                                    <b-icon icon="cloud-upload" font-scale="4"></b-icon>
                                    <div class="mb-3">Data yang Anda input sedang kami prosess...</div>
                                    <b-progress
                                        min="1"
                                        max="20"
                                        :value="counter"
                                        variant="success"
                                        height="3px"
                                        class="mx-n4 rounded-0"
                                    />
                                </div>
                                <div
                                    v-else
                                    ref="dialog"
                                    tabindex="-1"
                                    role="dialog" 
                                    class="text-center p-3"
                                >
                                    <p><strong id="form-confirm-label">Pastikan data yang Anda input telah benar!</strong></p>
                                    <div class="d-flex">
                                        <b-button variant="outline-danger btn-sm" @click="onCancel">Batal</b-button>
                                        <b-button variant="outline-success btn-sm" style="margin-left:3px" @click="onOK">Lanjut!</b-button>
                                    </div>
                                </div>
                            </template>
                        </b-overlay>
                    </b-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        form: {
            name    : '',
            age     : '',
            nik     : '',
            ttl     : '',
            address : ''
        },
        show: true,
        busy: false,
        processing: false,
        counter: 1,
        interval: null
      }
    },
    beforeDestroy() {
      this.clearInterval()
    },
    methods: {
    clearInterval() {
        if (this.interval) {
          clearInterval(this.interval)
          this.interval = null
        }
      }, 
      onSubmit(e) {
        e.preventDefault()
        this.processing = false
        this.busy = true 
            
      },
      onCancel() {
        this.busy = false
      },
      async onOK() { 
        this.processing = true
        await axios.post('/api/register/save', this.form, {onUploadProgress: progressEvent => {
            if (progressEvent.loaded === progressEvent.total) {
                this.counter++
            }
        }})
        .then((res) => {
            this.$nextTick(() => {
                this.busy = this.processing = false
                this.$toast.info("Terimakasih. Data Berhasil Di Input.", {
                    position: "top-right",
                    timeout: 2000,
                    closeOnClick: true,
                    pauseOnFocusLoss: true,
                    pauseOnHover: true,
                    draggable: true,
                    draggablePercent: 0.6,
                    showCloseButtonOnHover: false,
                    hideProgressBar: false,
                    closeButton: "button",
                    icon: true,
                    rtl: false
                });
            })
            this.onReset()
        });
      },
      onReset() { 
        this.form.name = ''
        this.form.age = ''
        this.form.nik = '' 
        this.form.ttl = '' 
        this.form.address = '' 
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>