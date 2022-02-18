<template>
    <nav>
        <div id="nav" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div id="nav_list" class="swiper-slide" v-for="(key, category) in categories" v-on:click="click(key)" :key="key">
                    <p>{{ category }}</p>
                </div>
            </div>
        </div>
        <div id="nav_sub">
            <div id="nav_list" v-for="sub_category in sub_categories" :key="sub_category">
                <p>{{ sub_category }}</p>
            </div>
        </div>    
        <!-- <Test></Test> -->
    </nav>
</template>

<script>
// import Test from './Test.vue';
import Item from './Item.vue';
    
export default {
    // components: {
    //     'Test' : Test
    // },
    data() {
        return {
            categories: {
                '전체' : '01_00',
                '패션잡화/화장품' : '01_01',
                '의류/언더웨어' : '01_02',
                '출산/유아동/완구' : '01_03',
                '가구/생활/취미' : '01_04',
                '스포츠/건강/식품' : '01_05',
                '가전/휴대폰/산업' : '01_06'
            },
            sub_categories: ['원산지전체', '국산/국내산', '국외산'],
            }
        },
    methods: {
        click: function(cats){
            console.log(this);
            Item.methods.getitemlist(cats);
            // console.log(this.$refs);
        }
    }
}
</script>
