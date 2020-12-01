import xlsxwriter
from openpyxl import Workbook
from openpyxl import load_workbook
import sys

# Note the file extension should be .xlsm.
workbook = xlsxwriter.Workbook('macro.xlsm')
worksheet = workbook.add_worksheet()
worksheet.set_column('A:Z', 24)

# Add text format
text_format = workbook.add_format()
text_format.set_font_size(30)

# Show text for the end user.
worksheet.write('C2', 'Export Macro Excel With Laravel Python', text_format)
worksheet.write('A4', 'Press the button to say hello.')

# Add the VBA project binary.
workbook.add_vba_project('./vbaProject.bin')

# Add a button tied to a macro in the VBA project.
worksheet.insert_button('B4', {'macro': 'say_hello',
                               'caption': 'ClickMe',
                               'width': 80,
                               'height': 20})

workbook.close()
