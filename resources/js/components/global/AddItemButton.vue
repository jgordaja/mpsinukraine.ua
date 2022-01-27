<template>
    <section class="py-2 text-center container">
        <div class="row py-lg-2">
            <div class="col-12 mx-auto mb-2">
                <button class="add-new-post">
                    <slot>Submit</slot>
                </button>
            </div>
        </div>
    </section>
</template>

<script>
export default {
  name: "AddItemButton",
}
</script>

<style scoped>

    .add-new-post {
        max-width: 100%;
        padding: 0 10px;
        background: #F6F2FA;
        border-radius: 8px;
        font-style: normal;
        font-weight: 600;
        font-size: 18px;
        line-height: 32px;
        align-items: center;
        text-align: center;
        color: #7649AD;
        outline: none;
        box-shadow: 0 2px 7px rgba(110, 76, 151, 0.25), 0 12px 24px rgba(110, 76, 151, 0.37);
        transition-property: color,background-color,  font-weight;
        transition-duration: 0.5s;
        transition-timing-function: ease-out;
        cursor: pointer;
    }
    .add-new-post:hover {
        color: #222222;
        background-color: #cbacf1;
    }

</style>
