<style>
    .myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    }

    .myImg:hover {
    opacity: 0.7;
    }


    /* The Modal (background) */

    .modal-image {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.9);
    /* Black w/ opacity */
    color: #fff;
    }


    /* Modal Content (Image) */

    .modal-image-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 1000px;
    }
    .close {
        height: 25px;
        width: 2px;
        background-color: black;
        transform: rotate(90deg);
        Z-index: 2;
    }
    #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
    }
</style>