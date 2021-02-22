<?php

return [
    /*
     * Order statuses
     */
    \App\Models\Shop\Order::STATUS_AWAITING_PAYMENT => 'Awaiting payment',
    \App\Models\Shop\Order::STATUS_AWAITING_SHIPPING => 'Awaiting Shipping',
    \App\Models\Shop\Order::STATUS_SHIPPED => 'Shipped',
];
