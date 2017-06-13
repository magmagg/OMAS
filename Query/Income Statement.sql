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
    
    
    Ang input lang dito is
		Other income (NULLABLE)
    at 
		Interest expense (NOT NULL)
    
    Form bago mag output:
    
    Monthly:
    
		Select Year				Select Month
        
        Other Income: 
        Interest Expense:
        
        
					Button <GENERATE>
                    
                    
    Quarterly:
    
		Select Year				Select Quarter 1,2,3,4
        
        Other Income: 
        Interest Expense:
        
        
					Button <GENERATE>
                    
                    
    Semi Annual:
    
		Select Year				Select Half 1st,2nd
        
        Other Income: 
        Interest Expense:
        
        
					Button <GENERATE>
                    
                    
    Annual:
    
		Select Year:
        
        Other Income: 
        Interest Expense:
        
        
					Button <GENERATE>

*/

-- MONTHLY

	-- Revenue
		select sum(Total) as Total
		from service_invoice
		Where MONTH(TransactionDate) = 6
		and YEAR(TransactionDate) = 2016;

	-- Cost of Services

	-- Begin Inventory
		SELECT sum(total) as Total
		FROM purchasing_order
		where MONTH(TransactionDate) = 6
		and YEAR(TransactionDate) = 2016;


		-- End Inventory
		SELECT sum(Total)
		FROM service_invoice
		where MONTH(TransactionDate) = 6
		and YEAR(TransactionDate) = 2016;

		
	-- Expenses
		
	-- Entertainment
		SELECT sum(value)
		FROM entertainment
		where MONTH(date_created) = 6
		and YEAR(date_created) = 2016;
		
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
    
    
-- Quarterly. values are integer. 

	-- Revenue
		select sum(Total) as Total
		from service_invoice
		Where Quarter(TransactionDate) = 1
		and YEAR(TransactionDate) = 2016;

	-- Cost of Services

	-- Begin Inventory
		SELECT sum(total) as Total
		FROM purchasing_order
		where Quarter(TransactionDate) = 1
		and YEAR(TransactionDate) = 2016;


		-- End Inventory
		SELECT sum(Total)
		FROM service_invoice
		where Quarter(TransactionDate) = 1
		and YEAR(TransactionDate) = 2016;

		
	-- Expenses
		
	-- Entertainment
		SELECT sum(value)
		FROM entertainment
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;
		
	-- fees
		SELECT sum(value)
		FROM fees
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;
		
	-- insurance
		SELECT sum(value)
		FROM insurance
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;
		
	-- interest
		SELECT sum(value)
		FROM interest
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;

	-- maintenance
		SELECT sum(value)
		FROM maintenance
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;
		
	-- other_expenses
		SELECT sum(value)
		FROM other_expenses
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;
		
	-- rent
		SELECT sum(value)
		FROM rent
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;
		
	-- supplies
		SELECT sum(value)
		FROM supplies
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;
		
	-- training
		SELECT sum(value)
		FROM training
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;

	-- travel
		SELECT sum(value)
		FROM travel
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;
		
	-- wages
		SELECT sum(value)
		FROM wages
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;
    
    
    
-- SEMI ANNUAL 
-- Between statement is month count 1-6 = 1st half
-- 7-12 = 2nd half

	-- Revenue
		select sum(Total) as Total
		from service_invoice
		Where MONTH(TransactionDate) 
			BETWEEN 1 AND 6
		and YEAR(TransactionDate) = 2016;



	-- Cost of Services

	-- Begin Inventory
		SELECT sum(total) as Total
		FROM purchasing_order
		Where MONTH(TransactionDate) 
			BETWEEN 1 AND 6
		and YEAR(TransactionDate) = 2016;


		-- End Inventory
		SELECT sum(Total)
		FROM service_invoice
		Where MONTH(TransactionDate) 
			BETWEEN 1 AND 6
		and YEAR(TransactionDate) = 2016;

		
	-- Expenses
		
	-- Entertainment
		SELECT sum(value)
		FROM entertainment
		where MONTH(date_created) 
			BETWEEN 1 AND 6
		and YEAR(date_created) = 2016;
		
	-- fees
		SELECT sum(value)
		FROM fees
		where MONTH(date_created) 
			BETWEEN 1 AND 6
		and YEAR(date_created) = 2016;
		
	-- insurance
		SELECT sum(value)
		FROM insurance
		where MONTH(date_created) 
			BETWEEN 1 AND 6
		and YEAR(date_created) = 2016;
		
	-- interest
		SELECT sum(value)
		FROM interest
		where MONTH(date_created) 
			BETWEEN 1 AND 6
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
		where MONTH(date_created) 
			BETWEEN 1 AND 6
		and YEAR(date_created) = 2016;
		
	-- training
		SELECT sum(value)
		FROM training
		where MONTH(date_created) 
			BETWEEN 1 AND 6
		and YEAR(date_created) = 2016;

	-- travel
		SELECT sum(value)
		FROM travel
		where MONTH(date_created) 
			BETWEEN 1 AND 6
		and YEAR(date_created) = 2016;
		
	-- wages
		SELECT sum(value)
		FROM wages
		where MONTH(date_created) 
			BETWEEN 1 AND 6
		and YEAR(date_created) = 2016;   
    
    
-- ANNUAL. values are integer. 

	-- Revenue
		select sum(Total) as Total
		from service_invoice
		Where Quarter(TransactionDate) = 1
		and YEAR(TransactionDate) = 2016;

	-- Cost of Services

	-- Begin Inventory
		SELECT sum(total) as Total
		FROM purchasing_order
		where YEAR(TransactionDate) = 2016;


		-- End Inventory
		SELECT sum(Total)
		FROM service_invoice
		where YEAR(TransactionDate) = 2016;

		
	-- Expenses
		
	-- Entertainment
		SELECT sum(value)
		FROM entertainment
		where YEAR(date_created) = 2016;
		
	-- fees
		SELECT sum(value)
		FROM fees
		where Quarter(date_created) = 1
		and YEAR(date_created) = 2016;
		
	-- insurance
		SELECT sum(value)
		FROM insurance
		where YEAR(date_created) = 2016;
		
	-- interest
		SELECT sum(value)
		FROM interest
		where YEAR(date_created) = 2016;

	-- maintenance
		SELECT sum(value)
		FROM maintenance
		where YEAR(date_created) = 2016;
		
	-- other_expenses
		SELECT sum(value)
		FROM other_expenses
		where YEAR(date_created) = 2016;
		
	-- rent
		SELECT sum(value)
		FROM rent
		where YEAR(date_created) = 2016;
		
	-- supplies
		SELECT sum(value)
		FROM supplies
		where YEAR(date_created) = 2016;
		
	-- training
		SELECT sum(value)
		FROM training
		where YEAR(date_created) = 2016;

	-- travel
		SELECT sum(value)
		FROM travel
		where YEAR(date_created) = 2016;
		
	-- wages
		SELECT sum(value)
		FROM wages
		where YEAR(date_created) = 2016;
    
    
    
    
    
    
    
    
    
	
    
