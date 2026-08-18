import sys
import os

pdf_path = r"c:\xampp\htdocs\RKDF-bhopal\Content\Documents\board_of_management\Board of Management Member.pdf"

try:
    import pypdf
    reader = pypdf.PdfReader(pdf_path)
    text = ""
    for page in reader.pages:
        text += page.extract_text() + "\n"
    print("--- PYPDF OUTPUT ---")
    print(text)
except Exception as e:
    print(f"pypdf failed: {e}")
    try:
        import PyPDF2
        reader = PyPDF2.PdfReader(pdf_path)
        text = ""
        for page in reader.pages:
            text += page.extract_text() + "\n"
        print("--- PYPDF2 OUTPUT ---")
        print(text)
    except Exception as e2:
        print(f"PyPDF2 failed: {e2}")
        # Try pure python or pdftotext or powershell if available
        try:
            import fitz # PyMuPDF
            doc = fitz.open(pdf_path)
            text = ""
            for page in doc:
                text += page.get_text() + "\n"
            print("--- FITZ OUTPUT ---")
            print(text)
        except Exception as e3:
            print(f"fitz failed: {e3}")
