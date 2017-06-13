/*

							INCOME STATEMENT
							   JUNE 2016
	
    Total Revenue									    +$$$
    
    Cost of Services
		Begin Inventory							+$$$
        End Inventory							-$$$
        Total Cost										-$$$
        
	Expenses											-$$$
    
    (INPUT)Other Income									+$$$
    ------------------------------------------------------------
    Net Income Before Interest & Tax					 $$$
    
    (INPUT)Interest Expense								-$$$
    ------------------------------------------------------------
	Net Income Before Tax								 $$$

*/

-- Revenue
	select sum(Total) as Total
	from service_invoice
	Where MONTH(TransactionDate) = 6;
	and YEAR(TransactionDate) = 2016;

-- Cost of Services

-- Begin Inventory
	SELECT sum(total) as Total
	FROM purchasing_order
	where MONTH(TransactionDate) = 6
	and YEAR(TransactionDate) = 2016;


	-- End Inventory
	SELECT sum(service_invoice.Total)
	FROM service_invoice
	where MONTH(TransactionDate) = 6
	and YEAR(TransactionDate) = 2016;

    
-- Expenses
    
-- Entertainment
    SELECT sum(value)
	FROM entertainment
	where MONTH(entertainment.date_created) = 6
	and YEAR(entertainment.date_created) = 2016;
    
-- fees
    SELECT sum(value)
	FROM fees
	where MONTH(date_created) = 6
	and YEAR(date_created) = 2016;
    
-- insurance
    SELECT sum(value)
	FROM insurance
	where MONTH(date_created) = 6
	and YEAR(date_created) = 2016;
    
-- interest
    SELECT sum(value)
	FROM interest
	where MONTH(date_created) = 6
	and YEAR(date_created) = 2016;

-- maintenance
    SELECT sum(value)
	FROM maintenance
	where MONTH(date_created) = 6
	and YEAR(date_created) = 2016;
    
-- other_expenses
    SELECT sum(value)
	FROM other_expenses
	where MONTH(date_created) = 6
	and YEAR(date_created) = 2016;
    
-- rent
    SELECT sum(value)
	FROM rent
	where MONTH(date_created) = 6
	and YEAR(date_created) = 2016;
    
-- supplies
    SELECT sum(value)
	FROM supplies
	where MONTH(date_created) = 6
	and YEAR(date_created) = 2016;
    
-- training
    SELECT sum(value)
	FROM training
	where MONTH(date_created) = 6
	and YEAR(date_created) = 2016;

-- travel
    SELECT sum(value)
	FROM travel
	where MONTH(date_created) = 6
	and YEAR(date_created) = 2016;
    
-- wages
    SELECT sum(value)
	FROM wages
	where MONTH(date_created) = 6
	and YEAR(date_created) = 2016;
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
	
    
