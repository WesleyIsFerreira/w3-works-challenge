<template>
    <div class="pi">
        <!-- <div class="pi__box-1">
            <video class="pi__video" autoplay loop muted playsinline>
                <source src="/videos/circle.mp4" type="video/mp4" />
                Seu navegador não suporta vídeos em HTML5.
            </video>
        </div> -->
        <div class="container">
            <!-- <StepsZero /> -->
            <!-- <StepsOne /> -->
            <StepsTwo />
        </div>
    </div>
</template>

<style scoped lang="scss">
.pi {
    &__box-1 {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 66vw;
    }

    &__video {
        position: absolute;
        top: 0%;
        left: 50%;
        width: 100%;
        transform: translate(-18.5%, -19%);
        scale: 2.7;
    }


}
</style>
