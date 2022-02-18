    <template>
      <div>
        <input type="text" v-model="input_one">
        <component-two
            @CustomEventInputChanged="doSomenthing">
        </component-two>
      </div>
    </template>

    <script>
      import ComponentTwo from 'component-two.vue'

      export default {
        name: "component-one",
        components: {
          ComponentTwo
        },
        data() {
          return {
            input_one: 'Hello from ComponentOne',
            input_two: ''
          }
        },
        methods: {
            doSomenthing ( data ) {
                this.input_two = data;
            }
        }
      }
    </script>