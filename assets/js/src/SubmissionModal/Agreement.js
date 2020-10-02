import React from "react";
import { Field } from "formik";

const Agreement = ({ form, name, value }) => {
  return (
    <Field
      name={name}
      render={({ field, form }) => {
        return (
          <input
            type="checkbox"
            required={true}
            // checked={field.value}
            value={value}
            onChange={e => {
              form.setFieldValue(field.name, e.target.checked);
            }}
          />
        );
      }}
    />
  );
};

export default Agreement;
