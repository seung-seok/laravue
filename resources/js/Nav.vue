<template>
    <nav>
        <div id="nav" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div id="nav_list" 
                :class="{active : key.split('_')[1] === activeItem.split('_')[1]}" 
                class="swiper-slide" 
                v-for="(key, category) in categories" 
                @click="sendNum(key)" 
                :key="key">
                    <p>{{ category }}</p>
                </div>
            </div>
        </div>
        <div id="nav_sub">
            <div id="nav_list" 
            :class="{active : key+'_'+categoryNum === activeItem}" 
            v-for="(key, sub_category) in sub_categories" 
            @click="sendNum(key+'_'+categoryNum)" 
            :key="sub_category">
                <p>{{ sub_category }}</p>
            </div>
        </div>
    </nav>
</template>

<style>
#nav_list.active{
    font-weight: bold;
    color: black;
}
</style>

<script>    
export default {
    name: 'Nav',
    props: {

    },
    data() {
        return {
            categories: {
                '전체'            : '01_00',
                '패션잡화/화장품'  : '01_01',
                '의류/언더웨어'    : '01_02',
                '출산/유아동/완구' : '01_03',
                '가구/생활/취미'   : '01_04',
                '스포츠/건강/식품' : '01_05',
                '가전/휴대폰/산업' : '01_06'
            },
            sub_categories: {
                '원산지전체'    : '01',
                '국산/국내산'   : '02',
                '국외산'        : '03'
            },
            categoryNum: '00',
            activeItem : '01_00'
            }
        },
    methods: {
        sendNum(cats) {
            this.$emit("setInput", cats);
            this.activeItem = cats;
            this.categoryNum = cats.split('_')[1];
        }
    }
}

</script>
