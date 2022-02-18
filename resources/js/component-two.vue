    <template>
      <div>
        <input type="text" v-model="input_two" @change="emitEventChanged>
      </div>
    </template>

    <script>
      export default {
        name: "component-two",
        data() {
          return {
            input_one: 'Hello from ComponentTwo'
          }
        },
        methods: {
            emitEventChanged () {
                this.$emit('CustomEventInputChanged', this.input_two);
            }
        }

      }
    </script>