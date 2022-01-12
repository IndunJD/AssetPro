<style>
    form {
        /* height: 87vh; */
    }

    .profile {
        all: revert;
        display: grid;
        grid-template-columns: 1fr 1fr;
        background-color: #F1F4FF;
        overflow: hidden;
        padding: 0px;
        height: 87vh;
    }

    .profile>div {
        background-color: white;
        border-radius: 10px;

    }

    .leftSection,
    .rightSection {
        overflow-y: auto;
    }

    /* .leftSection::-webkit-scrollbar,
    .rightSection::-webkit-scrollbar{
        display: none;
    } */

    .profile .leftSection {
        display: grid;
        grid-template-rows: 4fr 6fr;
        justify-content: center;
        align-items: center;
        margin: 15px 7.5px 15px 15px;
        padding: 10px;

    }


    .leftSection>div {
        /* height: 100%; */
        /* width: 100%; */
    }

    .profileImageSection>img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
    }

    .leftSection .leftBottom {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100%;
    }

    .profileImageSection {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #uploadBtn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 150px;
        height: 40px;
        margin: 5px 0px;
        background: #5C6E9B;
        color: #F1F4FF;
        border-radius: 30px;
    }

    #uploadBtn:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }

    /* Form styling */
    .basic-information {
        width: calc(100% - 40px);
        height: calc(100% - 40px);
        display: flex;
        flex-wrap: wrap;
        padding: 10px;
        /* justify-content: space-around; */
    }

    .title {
        width: 100%;
        color: #304068;
        font-weight: bolder;
        margin: 10px 0px;
        font-size: 20px;
    }

    .col-f {
        width: 100%;
        color: #5C6E9B;
    }

    .col-f select {
        justify-content: center;
        align-items: center;
        width: calc(94% - 30px);
        border: none;
        background-color: #F1F4FF;
        height: 35px;
        border-radius: 9px;
        padding: 3px 3px;
        margin-top: 10px;
        outline: none;
    }

    .col-h {
        width: 50%;
        color: #5C6E9B;
    }

    .col-btn {
        position: relative;
        text-align: center;
        width: 100%;
        align-items: center;
        margin: 10px 0px;

    }

    .col-btn>div {
        border-radius: 15px;
        padding: 10px 20px;
        color: white;
        font-size: 18px;
        background-color: #5C6E9B;
        width: 80px;
        max-height: 30px;
        position: relative;
        float: right;
        margin-right: 5px;
    }

    .col-f input[type=text],
    input[type=number],
    input[type=date],
    select {
        justify-content: center;
        align-items: center;
        width: calc(100% - 50px);
        border: none;
        background-color: #F1F4FF;
        height: 25px;
        border-radius: 9px;
        padding: 3px 3px;
        margin-top: 10px;
        outline: none;
    }

    .col-h input[type=text],
    input[type=number],
    input[type=date],
    select {
        justify-content: center;
        align-items: center;
        width: calc(94% - 30px);
        border: none;
        background-color: #F1F4FF;
        height: 25px;
        border-radius: 9px;
        padding: 3px 3px;
        margin-top: 10px;
        outline: none;
    }

    .shortInput {
        width: 35% !important;
        margin-left: 5px;
        margin-right: 5px;
    }

    .col-h,
    .col-f>span {
        display: block;
        margin-top: 5px;
    }

    .radio-group {
        margin: 5px 0px;
    }

    .radio-group>label {
        margin-left: 5px;
    }

    .radio-group>input[type=radio]:hover {
        cursor: pointer;
    }

    .col-btn>div:hover {
        cursor: pointer;
        background-color: #304068;
        transition: .5s;
    }

    #pRight {
        background-color: #F1F4FF;
        display: grid;
        grid-template-rows: 1fr 1fr;
        overflow-x: hidden;
    }

    #pRight>div {
        background-color: white;
        border-radius: 10px;
    }

    #pRight>div:nth-child(1) {
        margin: 15px 10px 5px 5px;
    }

    #pRight>div:nth-child(2) {
        margin: 5px 15px 10px 5px;
    }

    .col-btn {
        z-index: 1;
        position: absolute;
        left: 0px;
        bottom: 0px;
        right: calc(50%);
    }
</style>
<script>
    // Event listener to chande asset Types
    var categorySelect = document.getElementById('category');
    categorySelect.addEventListener('change', function(event) {
        setTypes(categorySelect.value);
    })

    // Get categories and types
    var categories = null;
    loadCategories();
    


    // Function to set categories

    


    



    // Enable / Disable the form fields

    // formID = the Id of the form that should be diabled
    // readonlyState ---->
    //      true --> form disabled 
    //      false --> form enabled 
    var imageUpload = document.getElementById('image');
    imageUpload.addEventListener('change', () => {
        const image = imageUpload.files[0];
        if (image) {
            var src = URL.createObjectURL(image);
            document.getElementById('imagePreview').src = src;
        }

    })


    sectionState('warrentySection', true);
    sectionState('depriciationSection', true);


    function sectionState(sectionID, state) {
        var inputs = document.getElementById(sectionID).querySelectorAll("input, select");
        inputs.forEach(input => {
            input.disabled = state;
        })
    }

    // formState("userProfileForm",true);

    document.querySelectorAll(".col-btn").forEach(button => {
        const cancelBtn = document.getElementById("cancelAddAsset");
        const saveBtn = document.getElementById("btnSaveAsset");
        button.addEventListener('click', function(event) {
            switch (event.target.id) {
                case 'cancelAddAsset':
                    setFocus('assets');
                    loadSection("centerSection", 'assets');
                    break;
                case 'btnSaveAsset':
                    var asset = getFormdata();
                    // saveAsset(asset);

                    // get Image and add it a form object
                    var image = document.getElementById('image').files[0];
                    if (image) {
                        var formData = new FormData();
                        formData.append('image', image);
                        formData.append('asset', JSON.stringify(asset));
                        postFiles('http://localhost/assetpro/asset/addImage', formData, (data) => {
                            if(data.status == 'success'){
                                console.log(data);
                                asset.image = data.imageUrl;
                                console.log(asset);
                                saveAsset(asset);
                            }
                        })
                    } 

                    break;

                default:
                    break;
            }


        })
    })
    var depriciation = document.getElementById('depriciation');
    depriciation.addEventListener('change', function() {
        sectionState('depriciationSection', !depriciation.checked);
        console.log(!depriciation.checked);
    })

    var warrenty = document.getElementById('warrenty');
    warrenty.addEventListener('change', function() {
        sectionState('warrentySection', !warrenty.checked);
        console.log(!warrenty.checked);
    })

    document.getElementById('image').addEventListener('change', function(e) {
        // console.log(e.target.files[0].value)
    })


    //get Form data

    function getFormdata() {
        form = new FormData(document.getElementById('addAssetForm'));
        var asset = {};
        for (var pair of form.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
            asset[pair[0]] = pair[1];
        }
        return asset;
    }


    //Save asset function ----->  Saving asset details through AJAX

    function saveAsset(asset) {
        postData('http://localhost/assetpro/asset/addAsset', asset, (data) => {
            console.log(data);

        })
    }
</script>

<form action="" id="addAssetForm">

    <div class="profile">
        <div id="pLeft" class="leftSection scrollBar">
            <div class="profileImageSection">
                <img src="../Images/addImage.png" alt="" id="imagePreview">
                <input type="file" name="image" id="image" hidden>
                <label for="image" id="uploadBtn">Choose Image</label>
            </div>
            <div class="leftBottom">
                <div class="basic-information">
                    <div class="title">Basic Information</div>

                    <!-- <div class="col-f">
                        <span for="assetId">Asset ID</span>
                        <input type="text" name="assetId" id="assetId">
                    </div>
                     -->
                    <div class="col-f">
                        <span for="assetName">Asset Name</span>
                        <input type="text" name="assetName" id="assetName">
                    </div>

                    <div class="col-f">
                        <span for="assetDescription">Asset Description</span>
                        <input type="text" name="assetDescription" id="assetDescription">
                    </div>
                    <div class="col-f">
                        <span for="category">Category</span>
                        <select name="category" id="category">
                            <option value="">Select Category</option>
                        </select>
                    </div>
                    <div class="col-f">
                        <span for="assetType">Asset Type</span>
                        <select name="assetType" id="assetType">
                            <option value="">Select Type</option>
                        </select>
                    </div>

                    <div class="col-f">
                        <span for="condition">condition</span>
                        <select name="condition" id="condition">
                            <option value="Brand New">Brand New</option>
                            <option value="Used">Used</option>
                        </select>
                    </div>

                    <div class="col-btn">
                        <div id="btnSaveAsset">Save</div>
                        <div id="cancelAddAsset">Cancel</div>
                    </div>

                </div>
            </div>
        </div>

        <div id="pRight" class="rightSection scrollBar">
            <div id="rightTop">
                <div class="basic-information">
                    <div class="col-f">
                        <span for="purchaseDate">Purchase Date</span>
                        <input type="date" name="purchaseDate" id="purchaseDate">
                    </div>
                    <div class="col-f">
                        <span for="purchaseCost">Purchase Cost</span>
                        <input type="number" name="purchaseCost" id="purchaseCost">
                    </div>
                    <div class="title" for="warrenty">Warrenty <input type="checkbox" name="warrenty" id="warrenty"></div>
                    <div id="warrentySection">

                        <div class="col-f">
                            <span for="warrentyPeriod">Warrenty Period</span>
                            <label for="fromDate">From</label><input class="shortInput" type="date" name="fromDate" id="fromDate">
                            <label for="toDate">To</label><input class="shortInput" type="date" name="toDate" id="toDate">
                        </div>
                        <div class="col-f">
                            <span for="otherInfo">Other Information</span>
                            <input type="text" name="otherInfo" id="otherInfo">
                        </div>

                    </div>
                </div>

            </div>

            <div>
                <div class="basic-information">
                    <div class="title" for="depriciation">Depriciation <input type="checkbox" name="depriciation" id="depriciation"></div>
                    <div id="depriciationSection">
                        <div class="col-f">
                            <span for="depriciationMethod">Depriciation Method</span>
                            <select name="depriciationMethod" id="depriciationMethod">
                                <option value="Staright Line">Straight Line Method</option>
                            </select>
                        </div>
                        <div class="col-f">
                            <span for="depriciaionRate">Depriciation Rate</span>
                            <input type="number" name="depriciaionRate" id="depriciaionRate" step=".01">
                        </div>
                        <div class="col-f">
                            <span for="residualValue">Residual Value</span>
                            <input type="number" name="residualValue" id="residualValue">
                        </div>
                        <div class="col-f">
                            <span for="usefulYears">Useful Years</span>
                            <input type="number" name="usefulYears" id="usefulYears" step="1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>