import openpyxl                      
import os ,sys


class Generatereport:

    def mainfunction(self,sam):
        book = openpyxl.load_workbook('QA_CheckList.xlsx')
        sheet = book.get_sheet_by_name('Sheet2')
        if os.path.exists('activity17.txt'):
            file = open('activity17.txt','r')
            array =  file.readlines()
            sheet['C101'] = array[0]
            sheet['D101'] = array[1]
            activity17status = array[2]
        else:
            sheet['D101'] = "File Improper"
            
        if os.path.exists('activity15.txt'):
            file = open('activity15.txt', 'r')
            array =  file.readlines()
            sheet['C95'] = array[0]
            sheet['C96']  = array[2]
            sheet['C97']  = array[4]
            sheet['D95'] = array[1]
            sheet['D96']  = array[3]
            sheet['D97'] = array[5]
            activity15status = array[6]
        else:
            sheet['D95'] = "File Improper"
            sheet['D96'] = "File Improper"
            sheet['D97'] = "File Improper"



        if os.path.exists('activity16.txt'):
            file = open('activity16.txt', 'r')
            array =  file.readlines()
            sheet['C99'] = array[0]
            sheet['D99'] = array[1]
            activity16status = array[2]
        else:
            sheet['D99'] = "File Improper"

        if os.path.exists('activity11.txt'):
            file = open('activity11.txt', 'r')
            array =  file.readlines()
            sheet['C74'] = array[0]
            sheet['C76'] = array[2]
            sheet['C78'] = array[4]
            sheet['D74'] = array[1]
            sheet['D76'] = array[3]
            sheet['D78'] = array[5]
            activity11status = array[6]
        else:
            sheet['D74'] = "File Improper"
            sheet['D76'] = "File Improper"
            sheet['D78'] = "File Improper"

        if os.path.exists('activity8.txt'):
            file = open('activity8.txt', 'r')
            array =  file.readlines()
            sheet['C62'] = str(array[0])
            sheet['C63'] = str(array[2])
            sheet['D62'] = str(array[1])
            sheet['D63'] = str(array[3] )
            activity8status = array[4]
        else:                                               
            sheet['D62'] = "File Improper"
            sheet['D63'] = "File Improper"

        if os.path.exists('activity5.txt'):
            file = open('activity5.txt', 'r')
            array =  file.readlines()
            sheet['C29'] = array[0]
            sheet['C30'] = array[2]
            sheet['C31'] = array[4]
            sheet['D29'] = array[1]
            sheet['D30'] = array[3]
            sheet['D31'] = array[5]
            activity5status = array[6]
        else:                                        
            sheet['D29'] = "File Improper"
            sheet['D30'] = "File Improper"
            sheet['D31'] = "File Improper"


        dest_filename = 'C:\\QI_REPORTS\\' + 'QA_Report_'+sam+'.xlsx'
        book.save(dest_filename)

if __name__ == '__main__':
    sam = sys.argv[1]
    try:
        ge = Generatereport()
        ge.mainfunction(sam)
        if os.path.exists('activity17.txt'):
            os.remove('activity17.txt')
        if os.path.exists('activity16.txt'):
            os.remove('activity16.txt')
        if os.path.exists('activity15.txt'):
            os.remove('activity15.txt')
        if os.path.exists('activity11.txt'):
            os.remove('activity11.txt')
        if os.path.exists('activity8.txt'):
            os.remove('activity8.txt')
        if os.path.exists('activity5.txt'):
            os.remove('activity5.txt')
        print 'Success'
    except:
        print 'Failed'
