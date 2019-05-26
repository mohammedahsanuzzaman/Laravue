<template>
    <v-card>
        <v-card-text>
        <v-form>
            <h1>ASk QuEsTioN</h1>
            <div>
                <v-text-field
                v-model="form.title"
                label="Title"
                required
                ></v-text-field>
            </div>
        </v-form>
        <markdown-editor v-model="form.body"></markdown-editor>
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="#3490dc" outline round @click="save">save</v-btn>
            <v-btn color="warning" outline round @click="cancel">cancel</v-btn>
        </v-card-actions>

        

    </v-card>
</template>

<script>
export default {
    props:['data'],
    data(){
        return{
            form:{
                title: this.data.title,
                body: this.data.body
            }
        }
    },
    methods:{
        save(){
            console.log('clicked')
            axios.patch(`/api/question/${this.data.slug}`,this.form)
            .then(res=> window.location = `/question/${this.slugify(this.form.title)}`)
            .catch(err=> Exception.handle(err))
        },
        cancel(){
            EventBus.$emit('cancelEdit')
        },
        slugify(str){
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆĞÍÌÎÏİŇÑÓÖÒÔÕØŘŔŠŞŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇğíìîïıňñóöòôõøðřŕšşťúůüùûýÿžþÞĐđßÆa·/_,:;";
            var to   = "AAAAAACCCDEEEEEEEEGIIIIINNOOOOOORRSSTUUUUUYYZaaaaaacccdeeeeeeeegiiiiinnooooooorrsstuuuuuyyzbBDdBAa------";
            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }
    }

}
</script>

<style>

</style>
