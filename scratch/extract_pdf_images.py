import fitz  # PyMuPDF
import os

pdf_path = r"c:\xampp\htdocs\RKDF-bhopal\Content\Documents\board_of_management\Board of Management Member.pdf"
out_dir = r"c:\xampp\htdocs\RKDF-bhopal\scratch\pdf_pages"
os.makedirs(out_dir, exist_ok=True)

try:
    doc = fitz.open(pdf_path)
    for i, page in enumerate(doc):
        pix = page.get_pixmap(dpi=150)
        img_path = os.path.join(out_dir, f"page_{i+1}.png")
        pix.save(img_path)
        print(f"Saved page {i+1} to {img_path}")
except Exception as e:
    print(f"Extraction failed: {e}")
