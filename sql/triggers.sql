CREATE TRIGGER totalPaymentAmount BEFORE INSERT ON Payment_Transaction FOR EACH ROW SET @tPA = @tPA +NEW.Payment_Amount;

CREATE TRIGGER totalDeletedCustomer BEFORE DELETE ON Customer FOR EACH ROW SET @tDC = @tDC +1;

