<template>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="gov_id">المحافظة</label>
                <select name="gov_id" id="gov_id" class="form-control" v-model="selected_gov">
                    <option v-for="gov in govs" :value="gov.id" v-text="gov.ar_gov"></option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="state_id">الولاية</label>
                <select name="state_id" id="state_id" class="form-control" v-model="selected_state">
                    <option v-for="state in states" :value="state.id" v-text="state.ar_state"></option>
                </select>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {'govs': {type: Array, default: []}, 'selected_gov_prop': {type: Number, default: -1}, 'selected_states_prop': {type: Number, default: -1}},
        data: function () {
            return {
                selected_gov: 1,
                selected_state: 1,
            }
        },
        computed: {
            states: function () {
                return this.govs.filter((gov) => {
                    return gov.id == this.selected_gov;
                })[0].states;


            }
        },
        mounted() {
            if (this.selected_gov_prop != -1) {
                this.selected_gov = this.selected_gov_prop;
            }
            if (this.selected_states_prop != -1) {
                console.log(this.selected_states_prop)
                this.selected_state = this.selected_states_prop;
            }
        }
    }
</script>
