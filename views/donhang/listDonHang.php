<?php require_once './views/layout/header.php' ?>

<!-- Main Wrapper Start -->
<div class="wrapper bg--shaft">
    <!-- Header Area Start -->
    <?php require_once './views/layout/menu.php' ?>
    <!-- Header Area End -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Lịch sử mua hàng</h1>
                    <ul class="breadcrumb justify-content-center">
                        <li><a href="<?= BASE_URL ?>">trang chủ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content-wrapper">
        <div class="cart-area pt--40 pb--80 pt-md--30 pb-md--60">
            <div class="container">
                <div class="cart-wrapper bg--2 mb--80 mb-md--60">
                    <div class="row">
                        <div class="col-12">
                            <div class="cart-table table-content table-responsive">
                                <table class="table mb--30">
                                    <thead>
                                        <tr>
                                            <th>Số thứ tự</th>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($listDonHang)): ?>
                                        <?php foreach ($listDonHang as $key => $donHang): ?>
                                            <tr>
                                                <td class="wide-column"><?= $key + 1 ?></td>
                                                <td class="wide-column"><?= htmlspecialchars($donHang['ma_don_hang']) ?></td>
                                                <td class="wide-column"><?= formatDate($donHang['ngay_dat']) ?></td>
                                                <td class="wide-column"><?= formatPrice($donHang['tong_tien']+30000) . ' đ' ?></td>
                                                <td class="wide-column"><?= htmlspecialchars($donHang['ten_trang_thai']) ?></td>
                                                <td>
                                                    <a class="btn btn-medium btn-style-1" href="<?= BASE_URL . '?act=chi-tiet-don-hang&id_don_hang=' . htmlspecialchars($donHang['id']) ?>">
                                                    View
                                                    </a>
                                                    <!-- <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . htmlspecialchars($donHang['id']) ?>">
                                                        <button class="btn btn-warning">Hủy</button>
                                                    </a> -->

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Không có sản phẩm nào.</td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include_once './views/layout/footer.php' ?>