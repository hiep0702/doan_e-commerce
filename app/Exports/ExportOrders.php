<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportOrders implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = DB::table('orders As o')
            ->leftJoin('users as u', 'o.Customer_ID', '=', 'u.id')
            ->leftJoin('orders_details as od', 'o.ID', '=', 'od.Order_ID')
            ->leftJoin('payments as p', 'o.Payment_ID', '=', 'p.ID')
            ->leftJoin('codes as c', 'o.Code_ID', '=', 'c.ID')
            ->select('o.ID', 'o.Code as Order_Code', 'u.Code as Customer_Code', 'u.username as Username', 'o.Status', 'o.Location', 'p.Method', 'c.Code', 'o.Total_Paid', 'o.created_at', DB::raw('sum(od.Quantity) as TotalQuantity'), DB::raw('sum(od.Price * od.Quantity) as TotalPrice'))
            ->groupBy('Order_Code', 'Customer_Code', 'o.Status', 'o.Location', 'p.Method', 'c.Code', 'o.created_at')
            ->get();

        return $orders;
    }

    /**
     * Returns headers for report
     * @return array
     */
    public function headings(): array
    {
        return [
            'Mã đơn',
            'Khách hàng',
            'Tổng số lượng',
            'Tổng tiền',
            'Trạng thái',
            'Địa chỉ',
            'Thanh toán',
            'Mã giảm giá',
            'Ngày tạo đơn',
        ];
    }

    public function map($record): array
    {
        return [
            $record->Order_Code,
            $record->Username,
            $record->TotalQuantity,
            $record->Total_Paid,
            $record->Status,
            $record->Location,
            $record->Method,
            $record->Code,
            $record->created_at,
        ];
    }
}
