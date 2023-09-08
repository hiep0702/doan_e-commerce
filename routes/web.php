<?php

// Admin Controllers
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\aboutusController;
use App\Http\Controllers\client\homepageController;
use App\Http\Controllers\client\clientLoginController;
use App\Http\Controllers\client\mainproductController;
use App\Http\Controllers\client\reviewController;
use App\Http\Controllers\client\shoppingcartController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\client\clientProductController;
use App\Http\Controllers\client\smallShoppingCartController;
use App\Http\Controllers\client\wishListController;
use App\Http\Controllers\compareProductController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\subscribeController;
use App\Http\Controllers\orderController;
use GuzzleHttp\Psr7\Request;

Route::prefix('admin')->group(function () {
    Route::get('register', [AuthController::class, 'register'])
        ->name('admin.auth.register');

    Route::post('register', [AuthController::class, 'checkRegister'])
        ->name('admin.auth.check-register');

    Route::get('login', [AuthController::class, 'login'])
        ->name('admin.auth.login');

    Route::post('login', [AuthController::class, 'checkLogin'])
        ->name('admin.auth.check-login');
});

Route::prefix('admin')->middleware('admin.login')->group(function () {

    Route::get('logout', [AuthController::class, 'logout'])
        ->name('admin.auth.logout');

    // Home Routes
    Route::prefix('home')->group(function () {
        Route::get('', [DashBoardController::class, 'index'])
            ->name('admin.dashboard.index');

        // Revenue Routes
        Route::get('revenue-by-day', [DashBoardController::class, 'revenueByDay'])
            ->name('admin.dashboard.revenue-by-day');
        Route::get('revenue-by-month', [DashBoardController::class, 'revenueByMonth'])
            ->name('admin.dashboard.revenue-by-month');
        Route::get('revenue-by-year', [DashBoardController::class, 'revenueByYear'])
            ->name('admin.dashboard.revenue-by-year');

        // Export Routes
        Route::get('export-by-day', [DashBoardController::class, 'exportByDay'])
            ->name('admin.dashboard.export-by-day');
        Route::get('export-by-month', [DashBoardController::class, 'exportByMonth'])
            ->name('admin.dashboard.export-by-month');
        Route::get('export-by-year', [DashBoardController::class, 'exportByYear'])
            ->name('admin.dashboard.export-by-year');

        // Order Routes
        Route::get('order-by-day', [DashBoardController::class, 'orderByDay'])
            ->name('admin.dashboard.order-by-day');
        Route::get('order-by-month', [DashBoardController::class, 'orderByMonth'])
            ->name('admin.dashboard.order-by-month');
        Route::get('order-by-year', [DashBoardController::class, 'orderByYear'])
            ->name('admin.dashboard.order-by-year');

        // User Routes
        Route::get('user-by-day', [DashBoardController::class, 'userByDay'])
            ->name('admin.dashboard.user-by-day');
        Route::get('user-by-month', [DashBoardController::class, 'userByMonth'])
            ->name('admin.dashboard.user-by-month');
        Route::get('user-by-year', [DashBoardController::class, 'userByYear'])
            ->name('admin.dashboard.user-by-year');

        Route::get('trending-product', [DashBoardController::class, 'trendingProduct'])
            ->name('admin.dashboard.trending-product');
    });


    // Brand Routes
    Route::prefix('brand')->group(function () {
        Route::get('', [BrandController::class, 'index'])
            ->name('admin.brand.index');
        Route::get('create', [BrandController::class, 'create'])
            ->name('admin.brand.create');
        Route::post('store', [BrandController::class, 'store'])
            ->name('admin.brand.store');
        Route::get('edit/{id}', [BrandController::class, 'edit'])
            ->name('admin.brand.edit');
        Route::put('update/{id}', [BrandController::class, 'update'])
            ->name('admin.brand.update');
        Route::get('delete/{id}', [BrandController::class, 'delete'])
            ->name('admin.brand.delete');
        Route::post('search', [BrandController::class, 'search'])
            ->name('admin.brand.search');
    });

    // Category Routes
    Route::prefix('category')->group(function () {
        Route::get('', [CategoryController::class, 'index'])
            ->name('admin.category.index');
        Route::get('create', [CategoryController::class, 'create'])
            ->name('admin.category.create');
        Route::post('store', [CategoryController::class, 'store'])
            ->name('admin.category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])
            ->name('admin.category.edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])
            ->name('admin.category.update');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])
            ->name('admin.category.delete');
        Route::post('search', [CategoryController::class, 'search'])
            ->name('admin.category.search');
    });

    // Discount Code Routes
    Route::prefix('discount')->group(function () {
        Route::get('', [DiscountCodeController::class, 'index'])
            ->name('admin.discount.index');
        Route::get('create', [DiscountCodeController::class, 'create'])
            ->name('admin.discount.create');
        Route::post('store', [DiscountCodeController::class, 'store'])
            ->name('admin.discount.store');
        Route::get('edit/{id}', [DiscountCodeController::class, 'edit'])
            ->name('admin.discount.edit');
        Route::put('update/{id}', [DiscountCodeController::class, 'update'])
            ->name('admin.discount.update');
        Route::get('delete/{id}', [DiscountCodeController::class, 'delete'])
            ->name('admin.discount.delete');
        Route::post('search', [DiscountCodeController::class, 'search'])
            ->name('admin.discount.search');
        Route::post('check', [DiscountCodeController::class, 'check'])
            ->name('admin.discount.check');
    });

    // Mail Routes
    Route::prefix('mail')->group(function () {
        Route::get('', [MailController::class, 'index'])
            ->name('admin.mail.index');

        Route::get('sendMail', [MailController::class, 'getSendMail'])
            ->name('admin.mail.mail');
        
        Route::post('send', [MailController::class, 'PostSendMail'])
            ->name('admin.mail.send-mail');

        Route::post('search', [MailController::class, 'search'])
            ->name('admin.mail.search');
    });

    // Order Routes
    Route::prefix('order')->group(function () {
        Route::get('', [OrderDetailController::class, 'index'])
            ->name('admin.order-detail.index');
        Route::get('edit/{id}', [OrderDetailController::class, 'edit'])
            ->name('admin.order-detail.edit');
        Route::put('update/{id}', [OrderDetailController::class, 'update'])
            ->name('admin.order-detail.update');
        Route::get('detail/{id}', [OrderDetailController::class, 'detail'])
            ->name('admin.order-detail.detail');
        Route::get('search', [OrderDetailController::class, 'search'])
            ->name('admin.order-detail.search');
    });

    // Payment Code Routes
    Route::prefix('payment')->group(function () {
        Route::get('', [PaymentController::class, 'index'])
            ->name('admin.payment.index');
        Route::get('create', [PaymentController::class, 'create'])
            ->name('admin.payment.create');
        Route::post('store', [PaymentController::class, 'store'])
            ->name('admin.payment.store');
        Route::get('edit/{id}', [PaymentController::class, 'edit'])
            ->name('admin.payment.edit');
        Route::put('update/{id}', [PaymentController::class, 'update'])
            ->name('admin.payment.update');
        Route::get('delete/{id}', [PaymentController::class, 'delete'])
            ->name('admin.payment.delete');
        Route::post('search', [PaymentController::class, 'search'])
            ->name('admin.payment.search');
    });

    // Product Routes
    Route::prefix('product')->group(function () {
        Route::get('', [ProductController::class, 'index'])
            ->name('admin.product.index');
        Route::post('search', [ProductController::class, 'search'])
            ->name('admin.product.search');
        Route::get('create', [ProductController::class, 'create'])
            ->name('admin.product.create');
        Route::post('store', [ProductController::class, 'store'])
            ->name('admin.product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])
            ->name('admin.product.edit');
        Route::put('update/{id}', [ProductController::class, 'update'])
            ->name('admin.product.update');
        Route::get('delete/{id}', [ProductController::class, 'delete'])
            ->name('admin.product.delete');
        Route::get('search', [ProductController::class, 'search'])
            ->name('admin.product.search');
    });

    // ProductDetail Routes
    Route::prefix('product-detail')->group(function () {
        Route::get('', [ProductDetailController::class, 'index'])
            ->name('admin.product-detail.index');
        // Route::post('search', [ProductController::class, 'search'])
        //     ->name('admin.product-detail.search');
        Route::get('create/{id}', [ProductDetailController::class, 'create'])
            ->name('admin.product-detail.create');
        Route::get('detail/{id}', [ProductDetailController::class, 'detail'])
            ->name('admin.product-detail.detail');
        Route::post('store', [ProductDetailController::class, 'store'])
            ->name('admin.product-detail.store');
        Route::get('edit/{id}', [ProductDetailController::class, 'edit'])
            ->name('admin.product-detail.edit');
        Route::put('update/{id}', [ProductDetailController::class, 'update'])
            ->name('admin.product-detail.update');
        Route::get('delete/{id}', [ProductDetailController::class, 'delete'])
            ->name('admin.product-detail.delete');
        Route::get('search', [ProductDetailController::class, 'search'])
            ->name('admin.product-detail.search');
    });

    // Slide Code Routes
    Route::prefix('slide')->group(function () {
        Route::get('', [SlideController::class, 'index'])
            ->name('admin.slide.index');
        Route::get('create', [SlideController::class, 'create'])
            ->name('admin.slide.create');
        Route::post('store', [SlideController::class, 'store'])
            ->name('admin.slide.store');
        Route::get('edit/{id}', [SlideController::class, 'edit'])
            ->name('admin.slide.edit');
        Route::put('update/{id}', [SlideController::class, 'update'])
            ->name('admin.slide.update');
        Route::get('delete/{id}', [SlideController::class, 'delete'])
            ->name('admin.slide.delete');
        Route::get('search', [SlideController::class, 'search'])
            ->name('admin.slide.search');
    });

    // User Routes
    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'index'])
            ->name('admin.user.index');
        Route::get('detail/{id}', [UserController::class, 'detail'])
            ->name('admin.user.detail');
        Route::get('search', [UserController::class, 'search'])
            ->name('admin.user.search');
    });
});

Route::prefix('client')->group(function () {

    Route::get('home', [homepageController::class, 'getHomePage'])->name('homepage');
    Route::post('home', [homepageController::class, 'subscribe']);

    Route::get('aboutUs', [aboutusController::class, 'getAboutUs']);

    Route::get('forgetPassword', [EmailController::class, 'getRecoverPassword']);
    Route::post('forgetPassword', [EmailController::class, 'postRecoverPassword']);

    Route::get('login', [clientLoginController::class, 'getLogin'])->name('client.login');
    Route::post('login', [clientLoginController::class, 'postLogin']);


    Route::post('register', [clientLoginController::class, 'postRegister'])
        ->name('client.register');

    Route::get('review', [reviewController::class, 'getReview']);
    Route::get('productPage', [clientController::class, 'getProductPages']);
    Route::get('Favorite', [shoppingcartController::class, 'getWishList']);
    Route::get('Product', [mainproductController::class, 'getMainProduct']);
    Route::get('Favorite', [shoppingcartController::class, 'getWishList']);
    Route::get('password', [clientLoginController::class, 'getPassword']);
});

Route::prefix('client/products')->group(function () {

    Route::get('long-wallet', [clientProductController::class, 'getLongWallet']);
    Route::get('small-wallet', [clientProductController::class, 'getSmallWallet']);
    Route::get('cards-holder', [clientProductController::class, 'getCardsHolder']);
    Route::get('chain-and-strap', [clientProductController::class, 'getchainandStrap']);
    Route::get('new-arrival', [clientProductController::class, 'getNewArrival']);
    Route::get('discount', [clientProductController::class, 'getDiscount']);
    Route::get('trending', [clientProductController::class, 'getTrending']);
    Route::get('gucci', [clientProductController::class, 'getGucci']);
    Route::get('louis-vuiton', [clientProductController::class, 'getLouisVuiton']);
    Route::get('channel', [clientProductController::class, 'getChannel']);
    Route::get('dior', [clientProductController::class, 'getDior']);

    Route::get('specificProduct/{Slug}', [clientProductController::class, 'getSpecificProduct']);

    Route::get('specificProduct/pdf/{Slug}', [clientProductController::class, 'getPdfFile']);

    Route::get('compareproduct', [compareProductController::class, 'getCompareProduct'])
        ->name('compareProduct');

    Route::get('deleteproduct1', [compareProductController::class, 'deleteProduct1']);
    Route::get('deleteproduct2', [compareProductController::class, 'deleteProduct2']);
});


Route::prefix('client/products')->middleware('client-signIn')->group(function () {
    Route::post('specificProduct/{Slug}', [clientProductController::class, 'addToCart']);
});

Route::prefix('client')->middleware('client-signIn')->group(function () {
    Route::get('logout', [clientLoginController::class, 'logOut']);
});



Route::prefix('client')->middleware('client-signIn')->group(function () {
    // Route::get('myshoppingcart', [shoppingcartController::class, 'getShoppingCart']);

    Route::get('orders/{Code}', [orderController::class, 'getOrder']);
    Route::post('orders/{Code}', [orderController::class, 'cancelOrder']);


    // Route::post('minigame',[homepageController::class,'getCode']);
    

    Route::get('Cart', [shoppingcartController::class, 'getShoppingCart'])->name('myshoppingcart');
    Route::post('Cart', [shoppingcartController::class, 'checkOut'])->name('check.out');


    Route::post('Cart/increase', [shoppingcartController::class, 'handleIncreaseQuantity'])
        ->name('client.shopping-cart.handle-increase-quantity');

    Route::post('Cart/decrease', [shoppingcartController::class, 'handleDecreaseQuantity'])
        ->name('client.shopping-cart.handle-decrease-quantity');

    Route::post('small-cart/increase', [smallShoppingCartController::class, 'handleIncreaseQuantity'])
        ->name('client.small-shopping-cart.handle-increase-quantity');

    Route::post('small-cart/decrease', [smallShoppingCartController::class, 'handleDecreaseQuantity'])
        ->name('client.small-shopping-cart.handle-decrease-quantity');

    Route::post('Cart/discount-code', [shoppingcartController::class, 'getDiscountCode'])
        ->name('client.shopping-cart.get-discount-code');

    Route::get('Cart/removefromcart/{ID}', [shoppingcartController::class, 'removeFromCart']);

    Route::get('wishList', [wishListController::class, 'getWithList'])->name('wishList');


    Route::get('wishlist/remove/{ID}', [wishListController::class, 'removeFromWishList']);
    Route::get('Cart/addtocart/{ID}', [shoppingcartController::class, 'addToCart']);
    Route::get('wishlist/addtowishlist/{ID}', [wishListController::class, 'addToWishList']);
    Route::get('wishlist/removemultipleproducts/', [wishListController::class, 'removeMultipleProducts']);

    Route::get('wishlist/addtocart/{ID}', [wishListController::class, 'addToCart']);

    Route::get('myProfile', [clientController::class, 'getProfile']);
    Route::post('editProfile', [clientController::class, 'editProfile'])
        ->name('client.edit-profile');
    Route::post('editAvart', [clientController::class, 'editAvatar'])
        ->name('client.edit-avatar');

    Route::post('get-code', [homepageController::class, 'getCode'])
        ->name('client-home-page.get-code');

    Route::get('changepassword', [clientController::class, 'changePassword']);
});


