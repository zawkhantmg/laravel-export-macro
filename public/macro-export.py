import xlsxwriter
from openpyxl import Workbook
from openpyxl import load_workbook
import sys

data1 = sys.argv[1]
data2 = sys.argv[2]
# Note the file extension should be .xlsm.
workbook = xlsxwriter.Workbook('export-data.xlsm')
worksheet = workbook.add_worksheet()

worksheet.set_column('A:A', 30)

# Show text for the end user.
worksheet.write('A3', 'Press the button to say hello.')

worksheet.write('E1', data1)

worksheet.write('G1', data2)

# Add the VBA project binary.
workbook.add_vba_project('./vbaProject.bin')

# Add a button tied to a macro in the VBA project.
worksheet.insert_button('B6', {'macro': 'say_hello',
                               'caption': 'ClickMe',
                               'width': 80,
                               'height': 30})

workbook.close()

wb = load_workbook('export-data.xlsm', keep_vba=True)
# ws.cell(row=1,column=1).value = 9999999
ws = wb['Sheet1']
wb.save('export-data.xlsm')
